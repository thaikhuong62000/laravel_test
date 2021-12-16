<?php

namespace App\Http\Controllers;

use App\Mail\NotifyUser;
use App\Models\Account;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{

    /**
     * Calculate remaining time and return view 'index'
     */
    public static function getIndexPage() {
        $startDate = IndexController::getStartDate();
        $currentTime = Carbon::now();
        $remain_hours = 0;
        $remain_minutes = 0;
        $remain_seconds = 0;

        if ($currentTime->lessThanOrEqualTo($startDate) && $currentTime->diffInDays($startDate) == 0) {
            $remain_hours = $currentTime->diffInHours($startDate);
            $remain_minutes = $currentTime->diffInMinutes($startDate);
            $remain_seconds = $currentTime->diffInSeconds($startDate);
            $remain_seconds = $remain_seconds - 60 * $remain_minutes;
            $remain_minutes = $remain_minutes - 60 * $remain_hours;
        }

        return view('index', [
            'start_dtime' => $startDate,
            'remain_hours' => $remain_hours,
            'remain_minutes' => $remain_minutes,
            'remain_seconds' => $remain_seconds
        ]);
    }

    /**
     * Verify register info then create new account
     *
     * @param Request $request
     * @return response
     *      status_code
     *          0 -> success
     *          1 -> duplicated
     *          2 -> wrong information
     */
    public static function registerUser(Request $request) {
        // Check time
        $startDate = IndexController::getStartDate();
        $currentTime = Carbon::now();
        if ($currentTime->greaterThan($startDate)) {
            return response()->json([
                'status_code' => '2'
            ]);
        }
        // Check duplicated email
        if (Account::checkAccountIsCreated($request->email)) {
            return response()->json([
                'status_code' => '1'
            ]);
        }

        $newAccount = Account::createNewAccount($request);
        Mail::to($request->email)->send(new NotifyUser($newAccount));
        return response()->json([
            'status_code' => '0'
        ]);
    }

    public static function testEmail()
    {
        $mail = Mail::to('khuong.pham62000@hcmut.edu.vn')->send(new NotifyUser(Account::getRandomAccount()));
    }
}
