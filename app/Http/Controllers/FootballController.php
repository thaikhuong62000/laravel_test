<?php

namespace App\Http\Controllers;

use App\Models\Football;

class FootballController extends Controller
{
    public static function index() {
        $availableMatch = Football::getAvailableMatch();
        if (is_null($availableMatch)) {
            $currentFootballMatch = Football::getCurrentMatch();
            $startTime = Football::getStartTime($currentFootballMatch);
            return view('index', [
                'message' => 'Not available',
                'match' => $currentFootballMatch,
                'remain_time' => Football::formatTime($startTime)
            ]);
        }
        return view('index', [
            'message' => 'Available',
            'match' => $availableMatch,
            'remain_time' => Football::getRemainingTime()
        ]);
    }
}
