<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Jobs\StoreUserJob;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        StoreUserJob::dispatch($data); //забрасываем в джоб сохранение пользователя с отсылкой почты

        return redirect()->route('admin.users');
    }
}
