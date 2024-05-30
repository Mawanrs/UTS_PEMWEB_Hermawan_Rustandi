<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'fn_b_access',
            ],
            [
                'id'    => 18,
                'title' => 'tambah_siswaa_create',
            ],
            [
                'id'    => 19,
                'title' => 'tambah_siswaa_edit',
            ],
            [
                'id'    => 20,
                'title' => 'tambah_siswaa_show',
            ],
            [
                'id'    => 21,
                'title' => 'tambah_siswaa_delete',
            ],
            [
                'id'    => 22,
                'title' => 'tambah_siswaa_access',
            ],
            [
                'id'    => 23,
                'title' => 'penilaian_access',
            ],
            [
                'id'    => 24,
                'title' => 'penilaian_create',
            ],
            [
                'id'    => 25,
                'title' => 'penilaian_edit',
            ],
            [
                'id'    => 26,
                'title' => 'penilaian_show',
            ],
            [
                'id'    => 27,
                'title' => 'penilaian_delete',
            ],
            [
                'id'    => 28,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}