<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class ScoreBoard extends Model
{
    // use SoftDeletes;

    protected $table = 'score_board';

    protected $fillable = ['team_id', 'points', 'total_matches', 'win', 'loss', 'created_at', 'updated_at'];

    /**
     * Relation Between Team ID With Team Table -> id
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function team()
    {
        return  $this->belongsTo(Team::class, 'team_id', 'id');
    }
}
