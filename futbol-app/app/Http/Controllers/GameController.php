<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Services\TeamService;

class GameController extends Controller
{
    protected $teamService;

    public function __construct(TeamService $teamService)
    {
        $this->teamService = $teamService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $games = Game::all();

        return view('games.index', ['games' => $games]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() 
    {
        $teams = $this->teamService->getTeamsForActiveLeague();
        return view('games.create', ['teams' => $teams]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([    
            'league_id' => 'required',
            'game_number' => 'required|integer',
            'date' => 'required|date',
            'team1_id' => 'required',
            'team2_id' => 'required',
            'team1_goals' => 'required|integer',
            'team2_goals' => 'required|integer'
        ]);

        Game::create([
            'league_id' => $request->league_id,
            'game_number' => $request->game_number,
            'date' => $request->date,
            'team1_id' => $request->team1_id,
            'team2_id' => $request->team2_id,
            'team1_goals' => $request->team1_goals,
            'team2_goals' => $request->team2_goals
        ]);

        return redirect()->route('games.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
