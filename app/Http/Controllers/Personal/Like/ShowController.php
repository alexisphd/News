<?php

namespace App\Http\Controllers\Personal\Like;

use App\Http\Controllers\Controller;
use App\Models\Tag;

class ShowController extends Controller
{
    public function __invoke(Tag $tag)
    {

       return view('personal.likes.show', compact('tag'));
    }
}
