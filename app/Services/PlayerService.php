<?php

namespace App\Services;

use App\Models\Team;
use App\Models\Player;


class PlayerService
{

    /**
     * Get Players items from database
     *
     * @return mixed
     */
    public function getPlayers($team_id)
    {
        return Player::where('team_id', $team_id)->with(['team'])->get();
    }

    /**
     * Save items into database
     * @param $data
     * @param $path
     * 
     * @return bool
     */
    public function createPlayer($data, $path)
    {

        $player = new Player();
        $player->team_id = $data['team'];
        $player->first_name = strip_tags($data['first_name']);
        $player->last_name = strip_tags($data['last_name']);
        $player->jersey_number = $data['jersey_number'];
        $player->country = strip_tags($data['country']);
        $player->profile_img = $path;
        $player->total_matches = $data['total_matches'];
        $player->total_runs = $data['total_runs'];
        $player->highest_score = $data['highest_score'];
        $player->no_of_fifties = $data['no_of_fifties'];
        $player->no_of_hundreds = $data['no_of_hundreds'];
        $player->save();

        return TRUE;
    }
}
