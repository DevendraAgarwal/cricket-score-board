<?php

namespace App\Http\Controllers;

use App\Services\TeamService;

class ScoreBoardController extends Controller
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
        $points = $this->teamService->getScoreBoard();
        return view('scores.index', compact('points'));
    }
}
