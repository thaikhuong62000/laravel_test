<?php

namespace App\Http\Controllers;

use App\Models\Football;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{

    /**
     *  Check if football match is available
     *  Registered account if it is not existed
     *  Save bet info to account if user not bet
     *
     * @param Request $request
     * @return JsonResponse
     */
    public static function submitBetInfo(Request $request)
    {

        $footballMatch = Football::getAvailableMatch();
        if (is_null($footballMatch)) {
            return response()->json([
                'message' => 'Not available',
                'remain_time' => Football::getRemainingTime()
            ]);
        }

        if ($footballMatch->id != $request->match_id) {
            return response()->json([
                'message' => 'Not valid'
            ]);
        }

        $currentAccountOrNull = Account::getAccount($request->sdt);

        if (is_null($currentAccountOrNull)) {
            $currentAccountOrNull = Account::createNewAccount($request);

            return response()->json([
                'message' => 'Success'
            ]);
        }



        if ($currentAccountOrNull->match_id == $footballMatch->id) {
            return response()->json([
                'message' => 'Duplicated'
            ]);
        }

        $currentAccountOrNull->updateAccountInfo($request);
        return response()->json([
            'message' => 'Success'
        ]);
    }

    /**
     *  Get name and role of user
     *
     * @param Request $request
     * @return JsonResponse
     */
    public static function getInfo(Request $request): JsonResponse
    {
        $account = Account::getAccount($request->sdt);
        return response()->json([
            'name' => $account->name,
            'role' => $account->role
        ]);
    }
}
