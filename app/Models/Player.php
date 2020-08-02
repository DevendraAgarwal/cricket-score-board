<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Player extends Model
{
    // use SoftDeletes;

    protected $table = 'players';

    protected $fillable = [
        'team_id', 'first_name', 'last_name', 'country', 'jersey_number',
        'profile_img', 'total_matches', 'total_runs', 'highest_score', 'no_of_fifties', 
        'no_of_hundreds', 'created_at', 'updated_at'
    ];
    
    /**
     * To get Full name attribute
     * @return string
     */
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    /**
     * Relation Between Team ID With Team Table -> id
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function team()
    {
        return  $this->belongsTo(Team::class, 'team_id', 'id');
    }
}
