<?php

namespace App\Repositories;

use App\Enum\UserRoleEnum;
use Illuminate\Support\Facades\DB;

class AdminRepository
{
    /**
     * Query raw
     *
     * @param array $data
     *
     * @return array
     */
    public function rawEmployeeList(array $data): array
    {
        $SQL = "
            SELECT
                u.id AS user_id, u.name AS user_name, u.position AS user_position, u.birth_date AS user_age,
                u2.name AS admin_name,
                p.point AS user_point
            FROM users AS u
            INNER JOIN users AS u2 ON u2.id = u.user_id
            INNER JOIN points AS p ON p.user_id = u.id
            WHERE u.role = ? AND u.deleted_at IS NULL
        ";

        $bindings = [UserRoleEnum::EMPLOYEE->value];

        if (isset($data['start_date'])) {
            $SQL .= "AND p.point >= TIMESTAMP(?) AND p.point <= TIMESTAMP(?)";
            $bindings[] = $data['start_date'];
            $bindings[] = $data['end_date'];
        }

        $SQL .= "\nORDER BY u.id";

        return DB::select($SQL, $bindings);
    }
}
