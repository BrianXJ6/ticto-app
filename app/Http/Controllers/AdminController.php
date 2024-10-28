<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\AdminService;
use App\Http\Requests\UpdateRequest;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\RegisterRequest;

class AdminController extends Controller
{
    /**
     * Create a new AdminController instance
     *
     * @param \App\Services\AdminService $adminService
     */
    public function __construct(protected AdminService $adminService)
    {
        // ...
    }

    /**
     * Register a new employee by admin
     *
     * @param \App\Http\Requests\RegisterRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function employeeRegister(RegisterRequest $request): RedirectResponse
    {
        $this->adminService->employeeRegister($request->getData());

        return redirect()->route('admin.employees');
    }

    /**
     * Undocumented function
     *
     * @param \App\Http\Requests\UpdateRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function employeeUpdate(User $user, UpdateRequest $request): RedirectResponse
    {
        $user->forceFill($request->getData())->save();

        return redirect()->route('admin.employees');
    }

    /**
     * Undocumented function
     *
     * @param \App\Models\User $user
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function employeeDelete(User $user): RedirectResponse
    {
        $user->delete();

        return redirect()->back();
    }
}
