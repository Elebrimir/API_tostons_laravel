<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Player extends Model
{
    use HasFactory, HasApiTokens;

    protected $table = 'players';

    protected $primaryKey = 'id';

    protected $fillable = [
        'race',
        'win',
        'draw',
        'lose',
        'points',
        'touchdowns',
        'casualties',
        'triple_skull',
    ];

    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
