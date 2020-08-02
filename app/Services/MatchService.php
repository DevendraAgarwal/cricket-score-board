<?php

namespace App\Services;

use App\Models\Team;
use App\Models\Match;
use App\Models\ScoreBoard;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class MatchService
{

    /**
     * Get all items from database
     *
     * @return mixed
     */
    public function getAll()
    {
        return Match::with(['teamOne','teamTwo', 'winnerTeam'])->get()->sortBy('match_date');
    }

    /**
     * To create the match automatic
     * @return json response
     */
    public function autoSetupMatch()
    {
        $today_date = Carbon::today();
        $matches = Match::whereDate('match_date', $today_date)->get();
        $arr = array();
        foreach ($matches as $match) {
            array_push($arr, $match['team_one_id']);
            array_push($arr, $match['team_two_id']);
        }
        $teams = Team::whereNotIn('id', $arr)->get();

        if (count($teams) > 1) {
            $teams = json_decode(json_encode($teams), true);
            $result = $this->createMatch($teams, $today_date);

            return json_encode(['code' => '200', 'message' => 'Match Setup Successfully.']);
        } else {
            return json_encode(['code' => '400', 'message' => 'No Team Available For Today.']);
        }
    }

    /**
     * To store the automatic match fixture
     * @return data
     */
    public function createMatch($teams, $today_date)
    {
        $keys = array_rand($teams, 2);
        DB::transaction(function () use ($teams, $today_date, $keys) {
            $match = new Match();
            $match->team_one_id = $teams[$keys[0]]['id'];
            $match->team_two_id = $teams[$keys[1]]['id'];
            $match->winner_team_id = $teams[$keys[0]]['id'];
            $match->match_date = $today_date;
            $match->save();

            ScoreBoard::where('team_id', $match->winner_team_id)->update([
                'total_matches' => DB::raw('total_matches + 1'),
                'points' => DB::raw('points + 2'),
                'win' => DB::raw('win + 1')
            ]);
            ScoreBoard::where('team_id', $match->team_two_id)->update([
                'total_matches' => DB::raw('total_matches + 1'),
                'loss' => DB::raw('loss + 1')
            ]);
        });
        return TRUE;
    }
}
