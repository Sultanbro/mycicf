<?php
namespace App\Library\Services;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailService
{
    use Queueable, SerializesModels;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //...
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function sendMailRefundStatus($data){    // отправляется после того как ОД подтвердит или откажет в возврате
        $sendMail = Mail::send('emails.mail_refund_status', $data, function ($message) use ($data) {
            $message->from(env('MAIL_FROM'), env('MAIL_FROM_NAME'));
            $message->to($data['email']);
        });
        return $sendMail;
    }
}