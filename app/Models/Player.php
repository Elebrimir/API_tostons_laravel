<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $table = 'players';

    protected $primarykey = 'id';

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
