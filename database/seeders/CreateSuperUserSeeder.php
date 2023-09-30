<?php

namespace Database\Seeders;

use App\Models\v1\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class CreateSuperUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::createByEmail(['email' => 'info@elsa-alert.ru', 'password' => 'ZbCKzeD9YA3m@g']);
        $user = $user->confirmEmail($user->validate_email_code);

        $role = Role::create([
            'name' => 'super-user',
            'guard_name' => 'api',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $user->assignRole($role);
    }
}
