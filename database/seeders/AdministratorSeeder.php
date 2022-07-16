<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new \App\Models\User();
        $admin->nama = "admin";
        $admin->email = "admin@gmail.com";
        $admin->password = Hash::make("admin123");
        $admin->roles = "admin";

        $admin->save();
        $this->command->info("Admin berhasil ditambah");
    }
}
