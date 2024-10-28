<?php

namespace App\Http\Controllers\Auth;

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
        // ...
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
        $this->registerService->register($request->getData());

        return redirect()->route('admin.dashboard');
    }
}
