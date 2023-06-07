<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke()
    {
        $rawposts = Post::withoutTrashed()->withCount('likes');
        $popular_posts = $rawposts->orderBy('likes_count', 'DESC')->take(3)->get();
        $posts = $rawposts->paginate(6);
        return view('main.index', compact('posts', 'popular_posts'));
    }
}
