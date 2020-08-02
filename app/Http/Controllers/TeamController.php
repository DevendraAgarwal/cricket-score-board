<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TeamService;
use App\Http\Requests\TeamRequest;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    private $teamService;

    public function __construct(TeamService $teamService)
    {
        $this->teamService = $teamService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = $this->teamService->getAll();
        return view('teams.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teams.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\TeamRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeamRequest $request)
    {
        if (isset($request['logo'])) {
            $extension = $request->file('logo')->getClientOriginalExtension();
            $path = Storage::putFileAs('public', $request->file('logo'), time() . '.' . $extension);
        } else {
            $path = null;
        }
        $team = $this->teamService->createNewTeam($request->validated(), $path);
        return redirect()->route('teams.index')->with('success', 'New Team Added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
