<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Gift extends Model
{
    use HasFactory, HasApiTokens;

    protected $table = 'gifts';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'type',
    ];

    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
