<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'full_name' => 'Admin',
            'email' => 'admin@jal.com',
            'password' => bcrypt('jal@12'),
            'status' => 1
        ]);
    }
}
