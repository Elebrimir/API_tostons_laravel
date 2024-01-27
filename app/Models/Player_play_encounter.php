<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player_play_encounter extends Model
{
    use HasFactory;

    protected $table = 'players_plays_encounters';

    protected $primaryKey = ['player_id', 'encounter_id'];

    protected $fillable = [
        'td_player1',
        'td_player2',
        'cas_player1',
        'cas_player2',
        'triple_skull',
    ];

    public $incrementing = false; // Indica que las claves primarias no son incrementales

    public $timestamps = true;

    public function encounter()
    {
        return $this->belongsTo(Encounter::class, 'encounter_id');
    }

    public function  player()
    {
        return $this->belongsTo(Player::class, 'player_id');
    }
}
