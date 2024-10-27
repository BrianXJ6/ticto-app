<?php

namespace App\Http\Controllers\Auth;

use Illuminate\View\View;
use App\Enum\UserRoleEnum;
use App\Services\RegisterService;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    /**
     * Create new RegisterController instance
     *
     * @param RegisterService $registerService
     */
    public function __construct(protected RegisterService $registerService)
    {
        $this->middleware('guest');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm(): View
    {
        return view('auth.register', [
            'role_options' => UserRoleEnum::getValues(),
        ]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param \App\Http\Requests\RegisterRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(RegisterRequest $request): RedirectResponse
    {
        $user = $this->registerService->register($request->getData());

        return redirect(
            match ($user->role) {
                UserRoleEnum::ADMIN => '/admin',
                UserRoleEnum::EMPLOYEE => '/funcionarios',
            }
        );
    }
}
