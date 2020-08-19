<?php

namespace App\Console\Commands;

use App\CentcoinHistory;
use App\Comment;
use App\Library\Services\KiasServiceInterface;
use App\Mail\Email;
use App\Post;
use App\Relog;
use App\RelogUrl;
use App\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class Notification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email notification about employer post actions';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(KiasServiceInterface $kias) {
        $kias->initSystem();
        $comments = Comment::where('email_send', 0)
            ->where('created_at','>', new Carbon(strtotime('11.08.2020')))
            ->get();
        echo '#Found '.count($comments).' notification \n';
        foreach ($comments as $comment){
            if ($comment->answered_user_isn!=null){
                $commented_user = Comment::where('email_send', 0)->get();
            } else {
                $post = Post::findOrFail($comment->post_id);
                $emails = ($kias->getEmplInfo($post->user_isn, date('d.m.Y', time()), date('d.m.Y', time() + 60 * 60))->Mail);
                $user = User::where('ISN', $post->user_isn)->first();
                $commented_user = User::where('ISN', $comment->user_isn)->first();
                $email = explode(' ', $emails)[0];
                $email = str_replace(',', '', $email);
                if ($post->user_isn != $comment->user_isn) {
                    $result = Mail::to($email)->send(new Email([
                            'title' => 'Ваш запись прокомментировали',
                            'background_image' => asset('images/background.png'),
                            'htmlTitle' => 'Ваш запись прокомментировали',
                            'greeting' => "Уважаемый(-ая) " . $user->short_name,
                            'wish' => $commented_user->short_name . ' оставил комментарий',
                            'commentary' => $comment->text,
                        ]
                    ));
                }
            }
            $comment->email_send = 1;
            $comment->save();
        }
    }

}
