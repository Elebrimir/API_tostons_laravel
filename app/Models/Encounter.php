<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encounter extends Model
{
    use HasFactory;

    protected $table = 'encounters';

    protected $primaryKey = 'id';

    protected $fillable = ['table'];

    public $timestamps = true;

    public function player1()
    {
        return $this->belongsTo(Player::class, 'player1_id');
    }

    public function player2()
    {
        return $this->belongsTo(Player::class, 'player2_id');
    }

    public function round()
    {
        return $this->belongsTo(Round::class, 'round_id');
    }
}
