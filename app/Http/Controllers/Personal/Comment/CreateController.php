<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;

class CreateController extends Controller
{
    public function __invoke()
    {
        $comments = Comment::all();
        return view('personal.comments.create', compact('comments'));
    }
}
