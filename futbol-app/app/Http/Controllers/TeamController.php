<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Team;
use App\Services\LeagueService;


class TeamController extends Controller
{
    protected $leagueService;

    public function __construct(LeagueService $leagueService)
    {
        $this->leagueService = $leagueService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Eager load the league
        $teams = Team::with('league')
            ->orderBy('name', 'asc')
            ->get();

        $activeLeagueIsStarted = $this->leagueService->activeLeagueIsStarted();
        $getLeagues = $this->leagueService->getLeagues();
        return view('teams.index', [
            'teams' => $teams,
            'activeLeagueIsStarted' => $activeLeagueIsStarted,
            'getLeagues' => $getLeagues
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teams.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeamRequest $request)
    {
        $validated = $request->validated();
        $validated['logo'] = $request->file('logo')->store(options: 'logos');

        Team::create($validated);

        return redirect()->route('teams.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        return view('teams.edit', ['team' => $team]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeamRequest $request, Team $team)
    {
        $validated = $request->validated();

        if ($request->hasFile('logo')) {
            //TODO check if this if is necessary
            if ($team->logo) {
                Storage::disk('logos')->delete($team->logo);
            }
            $team->logo = $request->file('logo')->store(options: 'logos');
        }

        $team->update($validated);

        return redirect()->route('teams.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        if($team->league->started) {
            return redirect()->route('teams.index')->with('error', __('league_started_cant_delete_team'));
        }
        
        $logo = $team->logo;
        Storage::disk('logos')->delete($logo);
        $team->delete();
        return redirect()->route('teams.index');
    }
}
