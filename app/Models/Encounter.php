<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encounter extends Model
{
    protected $table = 'encounters';
    protected $primaryKey = 'id';
    public $timestamps = true;
    use HasFactory;
}
