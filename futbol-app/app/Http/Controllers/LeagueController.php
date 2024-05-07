<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLeagueRequest;
use App\Http\Requests\UpdateLeagueRequest;
use App\Http\Requests\ActivateLeagueRequest;
use Illuminate\Http\Request;
use App\Models\League;

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
        return view('leagues.edit', ['league' => League::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLeagueRequest $request, string $id)
    {
        $validated = $request->validated();

        $league = League::findOrFail($id);
        $league->update($validated);

        return redirect()->route('leagues.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        League::destroy($id);
        return redirect()->route('leagues.index');
    }

    /**
     * Update the active field in storage.
     */
    public function activate(ActivateLeagueRequest $request, string $id)
    {
        $validated = $request->validated();

        $league = League::findOrFail($id);
        $league->active = $validated['active'];
        // Here we use the save() method to be able to fire the saving event.
        // We use it in the model booted() method to propagate the change.
        $league->save();

        return redirect()->route('leagues.index');
    }

    /**
     * League dropdown.
     */
    public function dropdown(Request $request, string $id)
    {
        $request->validate([
            'active' => 'required'
        ]);

        $league = League::findOrFail($id);
        $league->active = $request->active;
        $league->save();

        return redirect()->back();
    }

    /**
     * Update the starteds field in storage.
     */
    public function start(Request $request, string $id)
    {
        $request->validate([
            'started' => 'required'
        ]);

        $league = League::findOrFail($id);
        $league->started = $request->started;
        $league->save();

        return redirect()->route('leagues.index');
    }
}
