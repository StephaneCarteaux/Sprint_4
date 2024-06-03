<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Services\TeamService;
use App\Services\LeagueService;
use Illuminate\Support\Collection;
use App\Http\Requests\StoreGameRequest;
use App\Http\Requests\UpdateGameRequest;

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
        // Eager load all games
        $games = Game::with('team1', 'team2')
            ->orderBy('game_number', 'asc')
            ->orderBy('date', 'asc', 'id')
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
    public function store(StoreGameRequest $request)
    {
        $validated = $request->validated();
        Game::create($validated);

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
    public function edit(Game $game)
    {
        $teams = $this->teamService->getTeamsForActiveLeague();
        return view('games.edit', ['game' => $game, 'teams' => $teams]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGameRequest $request, Game $game)
    {
        $validated = $request->validated();

        $game->update($validated);

        return redirect()->route('games.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        echo $game->id;
        $game->delete();
        return redirect()->route('games.index');
    }
}
