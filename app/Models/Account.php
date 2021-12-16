<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Action;

class Account extends Model
{
    use HasFactory;

    protected $table = 'account';
    public $timestamps = false;

    /**
     * Create new account
     *
     * @return Account
     */
    public static function createNewAccount($request) {
        $newAccount = new Account;
        $newAccount->name = $request->name;
        $newAccount->email = $request->email;
        $newAccount->phone = $request->phone;
        $newAccount->sex = $request->sex;
        $newAccount->job = $request->job;
        $newAccount->confirmed = 1;
        $newAccount->save();
        return $newAccount;
    }

    /**
     * Find account by email
     * Return null if not found
     *
     * @param string $email
     * @return Account|null
     */
    public static function findAccountByEmail($email) {
        return Account::where('email', $email)->first();
    }

    /**
     * Get random account
     */
    public static function getRandomAccount()
    {
        return Account::getAllConfirmedAccount()->random();
    }

    /**
     * Check if account is created
     *
     * @param string $email
     * @return boolean
     */
    public static function checkAccountIsCreated($email) {
        return !is_null(Account::findAccountByEmail($email));
    }

    /**
     * Return all confirmed accounts
     *
     * @return Collection Account
     */
    public static function getAllConfirmedAccount()
    {
        return Account::where('confirmed', 1)->get();
    }

    /**
     * Return all id of confirmed accounts
     *
     * @return Collection Account
     */
    public static function getAllConfirmedAccountID()
    {
        $confirmedAccounts = Account::getAllConfirmedAccount();
        return $confirmedAccounts->map(function ($value) {
            return $value->id;
        });
    }
}
