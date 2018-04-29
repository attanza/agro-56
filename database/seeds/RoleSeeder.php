<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();
        $roles = ['Super Administrator', 'Administrator', 'Superuser', 'User'];
        foreach ($roles as $role) {
            Role::create([
                'nama' => $role,
                'slug' => str_slug($role)
            ]);
        }

    }
}
