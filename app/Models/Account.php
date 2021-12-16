<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Account extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * @param $request
     * @return Account
     */
    public static function createNewAccount($request): Account
    {
        $account = new Account;
        $account->updateAccountInfo($request);
        return $account;
    }

    /**
     * @param $request
     * ->sdt: string
     * ->name: string
     * ->role: int
     * ->score: string
     * ->number_people: int
     * ->match_id: int
     */
    public function updateAccountInfo($request) {
        $this->sdt = $request->sdt;
        $this->name = $request->name;
        $this->role = $request->role;
        $this->time_predict = now();
        $score = explode("-", $request->score);
        $this->predict_1 = intval($score[0]);
        $this->predict_2 = intval($score[1]);
        $this->predict_people = $request->number_people;
        $this->match_id = $request->match_id;
        $this->save();
    }

    /**
     *  Get account by sdt
     *
     * @param string $sdt
     * @return Model|null
     */
    public static function getAccount(string $sdt)
    {
        return Account::where('sdt', $sdt)
            ->first();
    }
}
