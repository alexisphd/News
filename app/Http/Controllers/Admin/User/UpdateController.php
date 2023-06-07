<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Mail\User\VerifyMail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, User $user)
    {
        $data = $request->validated();
            $password = $data['password'];
            $data['password'] = Hash::make($data['password']);

        $user->update($data);
        \Illuminate\Support\Facades\Mail::to($data['email'])->send(new VerifyMail($password, $data['name']));

        return redirect()->route('admin.users');
    }
}
