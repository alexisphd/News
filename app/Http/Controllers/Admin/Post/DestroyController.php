<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;

class DestroyController extends PostBaseController
{
    public function __invoke(Post $post)
    {
        $this->service->delete($post);

        return redirect()->route('admin.posts');
    }
}
