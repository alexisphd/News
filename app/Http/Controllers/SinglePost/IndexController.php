<?php

namespace App\Http\Controllers\SinglePost;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {

        return redirect()->route('single.post');
    }
}
