<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // membuat beberapa role
        // membuat default user untuk super admin

        $ownerRole = Role::create([
            'name' => 'owner'
        ]);
        
        $studentRole = Role::create([
            'name' => 'student'
        ]);
        
        $teacherRole = Role::create([
            'name' => 'teacher'
        ]);

        // akun super admin untuk mengelola data awal, untuk data kategori, kelas, dsb
        $userOwner = User::create([
            'name' => 'Robby Ilham',
            'occupation' => 'Educator',
            'avatar' => 'images/default-avatar.png',
            'email' => 'robby@onlcourse.com',
            'password' => bcrypt('qwerty123')
        ]);

        $userOwner->assignRole($ownerRole);
    }
}