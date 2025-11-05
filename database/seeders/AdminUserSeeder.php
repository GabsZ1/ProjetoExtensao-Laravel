<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@exemplo.com'], // evita duplicar se já existir
            [
                'name' => 'Administrador',
                'password' => Hash::make('12345678'), // senha criptografada
                'is_admin' => true,
            ]
        );
    }
}
