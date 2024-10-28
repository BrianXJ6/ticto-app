<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Enum\UserRoleEnum;
use App\Services\AdminService;
use App\Services\EmployeeService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class WebController extends Controller
{
    /**
     * Create a new WebController instance
     *
     * @param \App\Services\AdminService $adminService
     * @param \App\Services\EmployeeService $employeeService
     */
    public function __construct(
        protected AdminService $adminService,
        protected EmployeeService $employeeService,
    ) {
        // ...
    }

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
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminDashboardPage(Request $request): Renderable
    {
        return view('dashboards.admin.dashboard', [
            'employees' => $this->adminService->rawEmployeeList($request->query()),
        ]);
    }

    /**
     * Manager employee by admin
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminDashboardEmployeesPage(): Renderable
    {
        return view('dashboards.admin.employees', [
            'employees' => Auth::user()->employees
        ]);
    }

    /**
     * Page for add new employee by admin
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminDashboardEmployeeNewPage(): Renderable
    {
        return view('dashboards.admin.register');
    }

    /**
     * Page for update employee by admin
     *
     * @param \App\Models\User $user
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminDashboardEmployeeUpdatePage(User $user): Renderable
    {
        return view('dashboards.admin.update', [
            'user' => $user
        ]);
    }

    /**
     * Show the employee dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function employeeDashboardPage(): Renderable
    {
        return view('dashboards.employee.dashboard', [
            'list_points' => $this->employeeService->listPoints(),
        ]);
    }

    /**
     * Show the employee update pass page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function employeeChangePassPage(): Renderable
    {
        return view('dashboards.employee.password');
    }
}
