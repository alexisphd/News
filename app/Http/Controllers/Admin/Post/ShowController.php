<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;

class ShowController extends PostBaseController
{
    public function __invoke(Post $post)
    {

        return view('admin.posts.show', compact('post'));
    }
}
