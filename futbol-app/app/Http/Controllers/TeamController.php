<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Team;


class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::all();

        return view('teams.index', ['teams' => $teams]);
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
    public function store(Request $request)
    {
        $request->validate([
            'league_id' => 'required',
            'name' => 'required',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        Team::create([
            'league_id' => $request->league_id,
            'name' => $request->name,
            'logo' => $request->file('logo')->store(options: 'logos')
        ]);


        return redirect()->route('teams.index');
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
        return view('teams.edit', ['team' => Team::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $team = Team::findOrFail($id);
        $team->name = $request->name;

        if($request->hasFile('logo')) {
            if ($team->logo) {
                Storage::disk('logos')->delete($team->logo);
            }
            $team->logo = $request->file('logo')->store(options: 'logos');
        }
        
        $team->save();

        return redirect()->route('teams.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $logo = Team::find($id)->logo;
            Team::destroy($id);
            Storage::disk('logos')->delete($logo);
            return redirect()->route('teams.index');
        } catch (\Exception $e) {
            return redirect()->route('teams.index')->with('error', $e->getMessage());
        }
    }
}
