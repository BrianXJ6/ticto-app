<?php

namespace App\Services;

use App\Enum\UserRoleEnum;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Validation\ValidationException;

class LoginService
{
    /**
     * Handle a login request to the application.
     *
     * @param array $credentials
     *
     * @return string
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(array $credentials): string
    {
        if (!$this->attemptLogin($credentials)) {
            throw ValidationException::withMessages(['email' => [trans('auth.failed')]]);
        }

        request()->session()->regenerate();

        return match (Auth::user()->role) {
            UserRoleEnum::ADMIN => route('admin.dashboard'),
            UserRoleEnum::EMPLOYEE => route('employee.dashboard'),
        };
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param array $credentials
     *
     * @return bool
     */
    protected function attemptLogin(array $credentials): bool
    {
        return $this->guard()->attempt($credentials);
    }

    /**
     * Log the user out of the application.
     *
     * @return void
     */
    public function logout(): void
    {
        $this->guard()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
    }


    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard(): StatefulGuard
    {
        return Auth::guard();
    }
}
