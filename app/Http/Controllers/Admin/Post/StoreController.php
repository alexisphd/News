<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Requests\Admin\Post\StoreRequest;

class StoreController extends PostBaseController
{
    public function __invoke(StoreRequest $request)
    {

            $data = $request->validated();
            $this->service->store($data);

        return redirect()->route('admin.posts');
    }
}
