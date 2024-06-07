<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLeagueRequest;
use App\Http\Requests\UpdateLeagueRequest;
use App\Http\Requests\ActivateLeagueRequest;
use App\Http\Requests\StartLeagueRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\League;
use App\Models\Team;

class LeagueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leagues = League::orderBy('id', 'asc')
            ->get();

        return view('leagues.index', ['leagues' => $leagues]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('leagues.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLeagueRequest $request)
    {
        $validated = $request->validated();

        League::create($validated);

        return redirect()->route('leagues.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(League $league)
    {
        return view('leagues.edit', ['league' => $league]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLeagueRequest $request, League $league)
    {
        $validated = $request->validated();
        $league->update($validated);

        return redirect()->route('leagues.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(League $league)
    {
        // As deleting a league also deletes the teams in that league, we also delete the logos of the teams
        foreach (Team::where('league_id', $league->id)->get() as $team)
        {
            if ($team->logo) {
                Storage::disk('logos')->delete($team->logo);
            }
        }

        $league->delete();

        return redirect()->route('leagues.index');
    }

    /**
     * Update the active field in storage.
     */
    public function activate(ActivateLeagueRequest $request, League $league)
    {
        $validated = $request->validated();

        $league->active = $validated['active'];
        // Here we use the save() method to be able to fire the saving event.
        // We use it in the model booted() method to propagate the change.
        $league->save();

        return redirect()->route('leagues.index');
    }

    /**
     * League dropdown.
     */
    public function dropdown(ActivateLeagueRequest $request, League $league)
    {
        $validated = $request->validated();

        $league->active = $validated['active'];
        // Here we use the save() method to be able to fire the saving event.
        // We use it in the model booted() method to propagate the change.
        $league->save();

        return redirect()->back();
    }

    /**
     * Update the starteds field in storage.
     */
    public function start(StartLeagueRequest $request, League $league)
    {
        $validated = $request->validated();
        $league->update($validated);

        return redirect()->route('leagues.index');
    }
}
