<?php

namespace App\Http\Controllers\Auth;

use App\Services\LoginService;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    /**
     * Create a new LoginController instance.
     *
     * @param \App\Services\LoginService $loginService
     */
    public function __construct(protected LoginService $loginService)
    {
        // ...
    }

    /**
     * Handle a login request to the application.
     *
     * @param \App\Http\Requests\LoginRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(LoginRequest $request): RedirectResponse
    {
        $redirect = $this->loginService->login($request->validated());

        return redirect()->intended($redirect);
    }

    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        $this->loginService->logout();

        return redirect('/');
    }
}
