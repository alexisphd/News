<?php

namespace App\Jobs;

use App\Mail\User\VerifyMail;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class StoreUserJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $password = Str::random(10);
        // $data['password'] = Hash::make($data['password']);
        $this->data['password'] = Hash::make($password);
        $user = User::firstOrCreate($this->data);
        Mail::to($this->data['email'])->send(new VerifyMail($password, $this->data['name']));
        event(new Registered($user)); //событие для подтверждения почты
    }
}
