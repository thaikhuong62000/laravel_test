<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    use HasFactory;
    public $timestamps = false;

    public static function createNewAccount($request)
    {
        $register = new Register();
        $register->updateRegisterInfo($request);
        return $register;
    }

    public function updateRegisterInfo($request)
    {
        $this->name = $request->name;
        $this->cmnd = $request->cmnd;
        $this->email = $request->email;
        $this->phone = $request->phone;
        $this->address = $request->address;
        $this->tp = $request->tp;
        $this->quan = $request->quan;
        $this->phuong = $request->phuong;
        $this->save();
    }
}
