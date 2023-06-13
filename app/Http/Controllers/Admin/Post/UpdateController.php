<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;

class UpdateController extends PostBaseController
{
    public function __invoke(UpdateRequest $request, Post $post)
    {
            $data = $request->validated();
            $this->service->update($data,$post);

       return redirect()->route('admin.posts');
    }
}
