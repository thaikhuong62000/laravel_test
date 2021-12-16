<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class RandomController extends Controller
{
    public static function getRandomPage()
    {
        return view('random-site');
    }

    public static function getRandomAccount()
    {
        $randomAccount = Account::getRandomAccount();
        return response()->json([
            'id' => $randomAccount->id,
            'name' => $randomAccount->name
        ]);
    }
}
