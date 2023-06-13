<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Comment;

class CommentDestroyController extends Controller
{
    public function __invoke(Comment $comment)
    {
        $comment->delete();

        return redirect()->route('admin.posts');
    }
}
