<?php

namespace App\Http\Controllers\Personal\Like;

use App\Http\Controllers\Controller;
use App\Models\Tag;

class EditController extends Controller
{
    public function __invoke(Tag $tag)
    {

        return view('personal.likes.edit', compact('tag'));
    }
}
