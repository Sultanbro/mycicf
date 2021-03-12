<?php

namespace App\Http\Middleware\News;

use App\Post;
use Closure;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class CheckPostAccess {
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        $postId = $request->get('postId');
        /**
         * @var $post Post
         */
        $post = Post::where('id', $postId)->first();

        if (!$post->is_mine) {
            throw new AccessDeniedHttpException();
        }

        $request->postEntity = $post;

        return $next($request);
    }
}
