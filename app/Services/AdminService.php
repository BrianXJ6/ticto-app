<?php

namespace App\Services;

use App\Models\User;
use App\Enum\UserRoleEnum;
use Illuminate\Support\Facades\Auth;
use App\Repositories\AdminRepository;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Date;

class AdminService
{
    /**
     * Create a new AdminService instance
     *
     * @param AdminRepository $adminRepository
     */
    public function __construct(protected AdminRepository $adminRepository)
    {
        // ...
    }

    /**
     * Register a new employee by admin
     *
     * @param array $data
     *
     * @return \App\Models\User
     */
    public function employeeRegister(array $data): User
    {
        /** @var \App\Models\User */
        $admin = Auth::user();

        return $admin->employees()->create(
            array_filter(array_merge($data, ['role' => UserRoleEnum::EMPLOYEE]))
        );
    }

    /**
     * Query raw
     *
     * @param array $data
     *
     * @return array
     */
    public function rawEmployeeList(array $data): array
    {
        $result = $this->adminRepository->rawEmployeeList($data);

        return array_map(fn($item) => (object) [
            'id' => $item->user_id,
            'name' => $item->user_name,
            'position' => $item->user_position,
            'age' => Date::createFromDate($item->user_age)->age,
            'admin_name' => $item->admin_name,
            'point' => $item->user_point,
        ], $result);
    }
}
