<?php
namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
class SendEmail
{
    use Queueable, SerializesModels;

    public $email_content;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email_content)
    {
        $this->email_content = $email_content;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function sendMailRefundStatus($data,$status){    // отправляется после того как ОД подтвердит или откажет в возврате
        $sendMail = Mail::send('emails.mail_refund_status', [$data, $status], function ($message) use($data) {
            $message->from(env('MAIL_FROM'), env('MAIL_FROM_NAME'));
            $message->to($data['email'])->cc($data['email']);
        });
        dd($sendMail);
    }
}