<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Football extends Model
{
    use HasFactory;

    /**
     *  Get current match to show in web
     *
     * @return Model|null
     */
    public static function getCurrentMatch()
    {
        return Football::where('time', '>', now())->orderBy('time')->first();
    }

    /**
     *  Get match can be bet
     *
     * @return Model|null
     */
    public static function getAvailableMatch()
    {
        $currentFootballMatch = self::getCurrentMatch();
        if (is_null($currentFootballMatch)) {
            return null;
        }
        $minTime = Football::getStartTime($currentFootballMatch);
        $maxTime = Carbon::parse($currentFootballMatch->time)->subMinutes(5);
        if (now()->greaterThanOrEqualTo($minTime) && now()->lessThanOrEqualTo($maxTime)) {
            return $currentFootballMatch;
        } else return null;
    }

    /**
     *  Get remaining time to next bet available
     *
     * @return string|null
     */
    public static function getRemainingTime()
    {
        $nearestMatch = Football::getAvailableMatch();
        if (is_null($nearestMatch)) {
            return null;
        }
        $nearestMatch_time = Carbon::parse($nearestMatch->time)->subMinutes(5);
        if (now()->lessThanOrEqualTo($nearestMatch_time)) {
            $days = now()->diffInDays($nearestMatch_time);
            $nearestMatch_time->subDays($days);
            $hours = now()->diffInHours($nearestMatch_time);
            $nearestMatch_time->subHours($hours);
            $minutes = now()->diffInMinutes($nearestMatch_time);
            $nearestMatch_time->subMinutes($minutes);
            $seconds = now()->diffInSeconds($nearestMatch_time);
            return ($days != 0) ?
                sprintf('%u ngày, %uh, %up, %us', $days, $hours, $minutes, $seconds) :
                sprintf('%uh %up %us', $hours, $minutes, $seconds);
        }
        return null;
    }

    /**
     *  Get start time of next bet
     *
     * @return string|null
     */
    public static function getStartTime($currentFootballMatch)
    {
        if (is_null($currentFootballMatch)) return new Carbon();
        $currentFootballMatch_time = Carbon::parse($currentFootballMatch->time);
        $startTime = Carbon::parse($currentFootballMatch->time)->subDay(3);
        $startTime->hour = 7;
        if ($currentFootballMatch_time->hour < 12) {
            $startTime->subDay();
        }
        return $startTime;

        $time = $startTime->hour;
        $day = $startTime->day;
        $month = $startTime->month;
        $year = $startTime->year;
        return;
    }

    public static function formatTime($time)
    {
        if (is_null($time)) {
            return $time;
        }
        return sprintf(
            '%u:00 ngày %u/%u/%u',
            $time->hour,
            $time->day,
            $time->month,
            $time->year
        );
    }
}
