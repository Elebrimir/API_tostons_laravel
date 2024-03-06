<?php

namespace App\Http\Controllers;

use App\Models\ActionLog;
use Illuminate\Http\Request;

class ActionLogController extends Controller
{
    public function index()
    {
        $actionLogs = ActionLog::all();

        return response()->json(['action_logs' => $actionLogs], 200);
    }

    public function show(ActionLog $actionLog)
    {
        return response()->json(['action_log' => $actionLog], 200);
    }
}
