<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\StatefulGuard;

class RegisterService
{
    /**
     * Handle a registration request for the application.
     *
     * @param array $data
     *
     * @return \App\Models\User
     */
    public function register(array $data): User
    {
        $user = $this->create($data);
        $this->guard()->login($user);

        return $user;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     *
     * @return \App\Models\User
     */
    protected function create(array $data): User
    {
        return User::create(array_filter($data));
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard(): StatefulGuard
    {
        return Auth::guard();
    }
}
