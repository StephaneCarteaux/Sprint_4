<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Services\TeamService;
use App\Services\LeagueService;
use Illuminate\Support\Collection;

class GameController extends Controller
{
    protected $teamService;
    protected $leagueService;

    public function __construct(TeamService $teamService, LeagueService $leagueService)
    {
        $this->teamService = $teamService;
        $this->leagueService = $leagueService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all games
        $games = Game::orderBy('game_number', 'asc')
            ->orderBy('date', 'asc')
            ->get();

        // Group games by game number.
        $groupedGames = $this->groupGamesByGameNumber($games);
        $activeLeagueIsStarted = $this->leagueService->activeLeagueIsStarted();

        // Send grouped games to view.
        return view('games.index', [
            'groupedGames' => $groupedGames,
            'activeLeagueIsStarted' => $activeLeagueIsStarted
        ]);
    }

    /**
     * Group games by game number.
     */
    private function groupGamesByGameNumber(Collection $games)
    {
        return $games->groupBy('game_number');
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
        $teams = $this->teamService->getTeamsForActiveLeague();
        return view('games.edit', ['game' => Game::findOrFail($id), 'teams' => $teams]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([    
            'game_number' => 'required|integer',
            'date' => 'required|date',
            'team1_id' => 'required',
            'team2_id' => 'required',
            'team1_goals' => 'required|integer',
            'team2_goals' => 'required|integer'
        ]);

        $game = Game::findOrFail($id);
        $game->game_number = $request->game_number;
        $game->date = $request->date;
        $game->team1_id = $request->team1_id;
        $game->team2_id = $request->team2_id;
        $game->team1_goals = $request->team1_goals;
        $game->team2_goals = $request->team2_goals;
        $game->save();

        return redirect()->route('games.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Game::destroy($id);
        return redirect()->route('games.index');
    }
}
