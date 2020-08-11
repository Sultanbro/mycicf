<?php
namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
class Email extends Mailable
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
    public function build()
    {
        $content = $this->email_content;
        $email = $this->from(env('MAIL_FROM'), env('MAIL_FROM_NAME'))
            ->subject($this->email_content['title'])
            ->replyTo(env('MAIL_REPLY_TO'))
            ->view('emails.notification', compact('content'));
        return $email;
    }
}
