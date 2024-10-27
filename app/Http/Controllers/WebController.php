<?php

namespace App\Http\Controllers;

use App\Enum\UserRoleEnum;
use Illuminate\Contracts\Support\Renderable;

class WebController extends Controller
{
    /**
     * Show the home page.
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

    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminDashboardPage(): Renderable
    {
        return view('dashboards.admin.dashboard');
    }

    /**
     * Show the employee dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function employeeDashboardPage(): Renderable
    {
        return view('dashboards.employee.dashboard');
    }
}
