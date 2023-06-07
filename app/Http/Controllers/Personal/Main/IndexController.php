<?php

namespace App\Http\Controllers\Personal\Main;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        //   $current_user = auth()->user()->name;
        $comments_quantity = auth()->user()->comments()->count();
        $likes_quantity = auth()->user()->likedPosts()->count();

        return view('personal.main.index', compact('comments_quantity', 'likes_quantity'));
    }
}
