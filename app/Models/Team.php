<?php

namespace App\Models;

use App\Models\ScoreBoard;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    // use SoftDeletes;

    protected $table = 'teams';

    protected $fillable = ['name', 'logo_img', 'club_state', 'status', 'created_at', 'updated_at'];
    
    /**
     * Get Team Points Details From ScoreBoard Table
     *
     * @return mixed
     */
    public function getScoreDetails()
    {
        return $this->hasOne(ScoreBoard::class, 'team_id', 'id');
    }
}
