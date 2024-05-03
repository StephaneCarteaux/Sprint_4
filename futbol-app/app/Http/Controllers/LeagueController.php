<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\League;

class LeagueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leagues = League::all();

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
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:leagues',
            'started' => 'required',
            'active' => 'required'
        ]);

        League::create([
            'name' => $request->name,
            'started' => $request->started,
            'active' => $request->active
        ]);

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
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|unique:leagues'
        ]);

        $league = League::findOrFail($id);
        $league->name = $request->name;
        $league->save();

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
    public function activate(Request $request, string $id)
    {
        $request->validate([
            'active' => 'required'
        ]);

        $league = League::findOrFail($id);
        $league->active = $request->active;
        $league->save();

        return redirect()->route('leagues.index');
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
