<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActionLog extends Model
{
    use HasFactory;

    protected $table = 'action_logs';

    protected $primaryKey = 'id';

    protected $fillable = ['user_id', 'action', 'ip', 'table', 'object_id'];

    public $timestamps = true;
}
