<?php

namespace App\Services;

use App\Models\Point;
use Illuminate\Support\Facades\Auth;

class EmployeeService
{
    /**
     * List of employee points
     *
     * @return void
     */
    public function listPoints()
    {
        $user = Auth::user();

        return $user->points;
    }

    /**
     * Register employee points
     *
     * @return \App\Models\Point
     */
    public function registerPoints(): Point
    {
        /** @var \App\Models\User */
        $user = Auth::user();

        return $user->points()->create(['point' => now()]);
    }

    /**
     * Update pass for employe logged
     *
     * @param array $credentials
     *
     * @return void
     */
    public function updatePass(array $credentials): void
    {
        /** @var \App\Models\User */
        $user = Auth::user();

        $user->forceFill($credentials)->save();
    }
}
