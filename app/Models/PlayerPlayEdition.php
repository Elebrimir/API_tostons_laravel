<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayerPlayEdition extends Model
{
    use HasFactory;

    protected $table = 'player_plays_editions';

    protected $primaryKey = ['player_id', 'edition_id'];

    public $timestamps = true;

    public function player()
    {
        return $this->belongsTo(Player::class, 'player_id');
    }

    public function edition()
    {
        return $this->belongsTo(Edition::class, 'edition_id');
    }
}
