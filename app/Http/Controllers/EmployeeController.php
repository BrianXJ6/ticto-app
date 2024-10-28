<?php

namespace App\Http\Controllers;

use App\Services\EmployeeService;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\EmployeeUpdatePasswordRequest;

class EmployeeController extends Controller
{
    /**
     * Create a new EmployeeController instance
     *
     * @param \App\Services\EmployeeService $employeeService
     */
    public function __construct(protected EmployeeService $employeeService)
    {
        // ...
    }

    /**
     * Update pass for employe logged
     *
     * @param \App\Http\Requests\EmployeeUpdatePasswordRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePass(EmployeeUpdatePasswordRequest $request): RedirectResponse
    {
        $this->employeeService->updatePass($request->validated());

        return redirect()->route('employee.dashboard');
    }

    /**
     * Register employee points
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function registerPoints(): RedirectResponse
    {
        $this->employeeService->registerPoints();

        return redirect()->back();
    }
}
