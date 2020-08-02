<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Match extends Model
{
    // use SoftDeletes;

    protected $table = 'matches';

    protected $fillable = ['team_one_id', 'team_two_id', 'winner_team_id', 'match_date', 'status','created_at', 'updated_at'];

    /**
     * Get Text According To Match Status
     * @return string
     */
    public function getMatchStatusText()
    {
        if($this->status == 1)
        {
            return "Played";
        }
        else{
            return "Not Played Yet";
        }
    }

    /**
     * Relation Between Team One With Teams Table -> id
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function teamOne()
    {
        return $this->belongsTo(Team::class, 'team_one_id', 'id');
    }

    /**
     * Relation Between Team Two With Teams Table -> id
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function teamTwo()
    {
        return $this->belongsTo(Team::class, 'team_two_id', 'id');
    }

    /**
     * Relation Between Winner Team With Teams Table -> id
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function winnerTeam()
    {
        return $this->belongsTo(Team::class, 'winner_team_id', 'id');
    }
}
