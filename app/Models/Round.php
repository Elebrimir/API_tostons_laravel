<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Round extends Model
{
    use HasFactory, HasApiTokens;

    protected $table = 'rounds';

    protected $primaryKey = 'id';

    protected $fillable = [
        'number',
    ];

    public $timestamps = true;

    public function edition()
    {
        return $this->belongsTo(Edition::class, 'edition_id');
    }
}
