<?php

namespace App\Services;

use App\Models\Team;
use App\Models\ScoreBoard;
use Illuminate\Support\Facades\DB;


class TeamService
{

    /**
     * Get all items from database
     *
     * @return mixed
     */
    public function getAll($status = null)
    {
        if ($status) {
            return Team::where(['status' => 1])->get();
        }
        return Team::all();
    }

    /**
     * Get One items From Database
     * 
     * @return mixed
     */
    public function getOne($team_id)
    {
        return Team::findOrFail($team_id);
    }

    /**
     * Get Score Board items from database
     *
     * @return mixed
     */
    public function getScoreBoard($status = null)
    {
        return Team::with(['getScoreDetails'])->get()->sortByDesc('getScoreDetails.points');
    }

    /**
     * Save items into database
     *
     * @return boolean
     */
    public function createNewTeam($data, $path)
    {
        DB::transaction(function () use ($data, $path) {
            $team = new Team();
            $team->name = $data['name'];
            $team->logo_img = $path;
            $team->club_state = $data['club_state'];
            $team->status = 1;
            $team->save();

            $score = new ScoreBoard();
            $score->team_id = $team->id;
            $score->points = 0;
            $score->total_matches = 0;
            $score->win = 0;
            $score->loss = 0;
            $score->save();

            return TRUE;
        });
    } 
    
    /**
     * Check Team Exist Or Not
     * 
     * @return boolean
     */
    public function checkTeam($team_id)
    {
        if (Team::where('id', $team_id)->exists()) {
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
}
