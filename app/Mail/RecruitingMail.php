<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class RecruitingMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $email;
    protected $msg;

//    private $form;
    /**
     * @var array
     */
//    private $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
//    $subject, $form, $data = []
    public function __construct($name, $email, $msg)
    {
        $this->name = $name;
        $this->email = $email;
        $this->msg = $msg;
//        $this->subject = $subject;
//        $this->form = $form;
//        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->view('emails.recruiting_header')
        ->with([
            'name' => $this->name,
            'email' => $this->email,
            'msg' => $this->msg,
        ])
        ->subject('Новое письмо');




        //        $email = $this->from(env('MAIL_FROM'), env('MAIL_FROM_NAME'))
//        $content = $this->email_content;


//        $email = $this->from('DJumagulov@cic.kz')
//            ->text('emails.recruiting_header', [
//                'var' => $this->subject,
//                'form' => $this->form,
//                'authEmail' => Auth::user()->email,
//                'data' => $this->data,
//            ])
//            ->subject($this->subject);
//        return $email;


//            ->replyTo(env('MAIL_REPLY_TO'))
//            ->view('emails.notification', compact('content'));


//        return $this->from(env('MAIL_FROM'), env('MAIL_FROM_NAME'))
//            ->subject($this->subject)
//            ->replyTo(env('MAIL_REPLY_TO'))
//            ->view('emails.recruiting');
    }
}
