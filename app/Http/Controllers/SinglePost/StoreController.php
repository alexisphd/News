<?php

namespace App\Http\Controllers\SinglePost;

use App\Http\Controllers\Controller;
use App\Http\Requests\Personal\Comment\StoreRequest;
use App\Models\Comment;
use App\Models\Post;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request, Post $post)
    {
        $data = $request->validated();
        try {
            $data['user_id'] = auth()->user()->id;
            $data['post_id'] = $post->id;
            Comment::firstOrCreate($data);
        } catch (\Exception $exception) {
            abort('500');
        }

        return redirect()->back();
    }
}
