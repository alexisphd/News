<?php

namespace App\Http\Controllers\SinglePost;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Carbon\Carbon;

class ShowController extends Controller
{
    public function __invoke(Post $post)
    {
        $related_posts = Post::with('category')
            ->where('category_id', '=', $post->category_id)
            ->where('id', '!=', $post->id)
            ->get()
            ->take(3);
        $date = Carbon::parse($post->created_at);
        return view('main.single_post', compact('post', 'related_posts', 'date'));
    }
}
