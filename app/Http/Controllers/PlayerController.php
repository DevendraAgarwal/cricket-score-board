<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TeamService;
use App\Services\PlayerService;
use App\Http\Requests\PlayerRequest;
use Illuminate\Support\Facades\Storage;

class PlayerController extends Controller
{
    private $playerService;
    private $teamService;

    public function __construct(PlayerService $playerService ,TeamService $teamService)
    {
        $this->playerService = $playerService;
        $this->teamService = $teamService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if(isset($request->team))
        {
            $teamExist = $this->teamService->checkTeam($team_id = $request->team);
            if($teamExist)
            {
                $team = $this->teamService->getOne($request->team);
                return view('players.create', compact('team'));
            }
            else{
                return redirect()->route('teams.index');
            }
        }
        else
        {
            return redirect()->route('teams.index');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlayerRequest $request)
    {
        if (isset($request['profile_img'])) {
            $extension = $request->file('profile_img')->getClientOriginalExtension();
            $path = Storage::putFileAs('public', $request->file('profile_img'), time() . '.' . $extension);
        } else {
            $path = null;
        }
        $player = $this->playerService->createPlayer($request->validated(), $path);
        return redirect()->route('teams.index')->with('success', 'Player Added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $team_id
     * @return \Illuminate\Http\Response
     */
    public function show($team_id)
    {
        $teamExist = $this->teamService->checkTeam($team_id);
        if ($teamExist) {
            $players = $this->playerService->getPlayers($team_id);
            return view('players.index', compact('players'));
        } else {
            return redirect()->route('teams.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
