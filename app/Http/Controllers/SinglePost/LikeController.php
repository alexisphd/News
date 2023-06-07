<?php

namespace App\Http\Controllers\SinglePost;

use App\Http\Controllers\Controller;
use App\Models\Post;

class LikeController extends Controller
{
    public function __invoke(Post $post)
    {
        auth()->user()->likedPosts()->toggle($post->id); //автоматически вставить-убрать привязку

        return redirect()->back();
    }
}
