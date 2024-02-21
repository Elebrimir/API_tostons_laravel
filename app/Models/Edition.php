<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Edition extends Model
{
    use HasFactory, HasApiTokens;

    protected $table = 'editions';

    protected $primaryKey = 'id';

    protected $fillable = [
        'year',
        'name',
    ];

    public $timestamps = true;
}
