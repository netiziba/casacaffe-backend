<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserRole;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::firstOrCreate(
            ['email' => 'admin@casacaffe.mk'],
            [
                'name'     => 'Casa Caffe Admin',
                'password' => Hash::make('Admin@2024!'),
            ]
        );

        UserRole::firstOrCreate([
            'user_id' => $user->id,
            'role'    => 'admin',
        ]);

        $user2 = User::updateOrCreate(
            ['email' => 'zibav123@gmail.com'],
            [
                'name'     => 'Admin',
                'password' => Hash::make('Admin1234!'),
            ]
        );

        UserRole::firstOrCreate([
            'user_id' => $user2->id,
            'role'    => 'admin',
        ]);

        $this->command->info("Admin accounts: admin@casacaffe.mk / Admin@2024! · zibav123@gmail.com / Admin1234!");
    }
}
