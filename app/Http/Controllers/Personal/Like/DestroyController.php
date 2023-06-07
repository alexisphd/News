<?php

namespace App\Http\Controllers\Personal\Like;

use App\Http\Controllers\Controller;

class DestroyController extends Controller
{
    public function __invoke($post)
    {
        auth()->user()->likedPosts()->detach($post); //открепляем лайки

        return redirect()->back();
    }
}
