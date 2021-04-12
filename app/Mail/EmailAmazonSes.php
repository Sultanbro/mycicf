<?php
namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
class EmailAmazonSes extends Mailable
{
    use Queueable, SerializesModels;

    public $email_content;
    public $order_type;
    public $policy_attachments;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email_content=null, $order_type=null, $attchment = null)
    {
        $this->email_content = $email_content;
        $this->order_type = $order_type;
        $this->policy_attachments = $attchment;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $content = 'Some text';
        $email = $this->from(env('MAIL_FROM'), env('MAIL_FROM_NAME'))
            ->subject('Уведомление с портала my.cic.kz | Рекрутинг')
            ->replyTo(env('MAIL_REPLY_TO'))
            ->view('emails.tour', compact('content'));

//        foreach ($this->policy_attachments as $key => $attachment){
//            $email->attachFromStorage($attachment, $key, [
//                'mime' => 'application/pdf',
//            ]);
//
//        }
        return $email;
    }
}
