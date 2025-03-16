<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

         // Crear un usuario administrador
         User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), // Contraseña por defecto
            'phone' => '123456789', // Campo adicional
            'address' => 'Calle Falsa 123', // Campo adicional
            'role' => 'admin', // Rol de administrador
        ]);

        // Crear un usuario invitado
        User::create([
            'name' => 'Guest User',
            'email' => 'guest@example.com',
            'password' => Hash::make('password'), // Contraseña por defecto
            'phone' => '987654321', // Campo adicional
            'address' => 'Avenida Siempre Viva 456', // Campo adicional
            'role' => 'guest', // Rol de invitado
        ]);

        // Opcional: Crear usuarios de prueba usando Factory
        User::factory(10)->create();
    }
}
