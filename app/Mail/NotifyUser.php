<?php

namespace App\Mail;

use App\Models\Account;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifyUser extends Mailable
{
    use Queueable, SerializesModels;

    public $id;
    public $name;
    public $sex;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($account)
    {
        $this->id = $account->id;
        $this->name = $account->name;
        $this->sex = $account->sex;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails/notify-user')
                    ->from('thaikhuong62000@gmail.com', 'BTC HNFVNS')
                    ->subject("Thư xác nhận đăng ký Home now for Vietnam Stronger");
    }
}
