<?php

namespace App\Http\Controllers;

use App\Enum\UserRoleEnum;
use Illuminate\Contracts\Support\Renderable;

class WebController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function indexPage(): Renderable
    {
        return view('home');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function loginPage(): Renderable
    {
        return view('auth.login');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function registerPage(): Renderable
    {
        return view('auth.register', [
            'role_options' => UserRoleEnum::getValues(),
        ]);
    }
}
