<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke()
    {
        $current_user = auth()->user()->name;
        $users_quantity = User::withoutTrashed()->count('id');
        $posts_quantity = Post::withoutTrashed()->count('id');
        $categories_quantity = Category::withoutTrashed()->count('id');
        $tags_quantity = Tag::withoutTrashed()->count('id');

        return view('admin.main.index',
            compact('users_quantity', 'posts_quantity', 'current_user',
                'categories_quantity', 'tags_quantity'));
    }
}
