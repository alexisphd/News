<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Personal\Comment\StoreRequest;
use App\Models\Comment;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
            $data = $request->validated();
        try {
            $data['user_id'] = auth()->user()->id;
            Comment::firstOrCreate($data);
        }
        catch (\Exception $exception){
            abort('500');
        }

        return redirect()->route('personal.comments');
    }
}
