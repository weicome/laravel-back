<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

         $root = \App\Models\AdminUser::create([
             'username' => 'Administrator',
             'account' => 'root',
             'password' => password_hash('123456',PASSWORD_DEFAULT),
             'status' => '1',
         ]);
         $root->roles()->sync([1]);
    }
}
