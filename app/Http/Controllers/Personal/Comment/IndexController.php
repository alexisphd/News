<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;

class IndexController extends Controller
{
    public function __invoke()
    {
        $comments = Comment::with('post', 'user')->where('user_id', '=', auth()->user()->id)->get();
        return view('personal.comments.index', compact('comments'));
    }
}
