<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Truncate tables to avoid repeated data
        User::truncate();
        DB::table('role_user')->truncate();

        // Get roles from roles table
        $adminRole = Role::where('name', 'admin')->first();
        $employeeRole = Role::where('name', 'employee')->first();
        $managerRole = Role::where('name', 'manager')->first();
        $customerRole = Role::where('name', 'customer')->first();

        // Create example users
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password')
        ]);

        $manager = User::create([
            'name' => 'Manager User',
            'email' => 'manager@manager.com',
            'password' => Hash::make('password')
        ]);

        $employee = User::create([
            'name' => 'Employee User',
            'email' => 'employee@employee.com',
            'password' => Hash::make('password')
        ]);

        $customer = User::create([
            'name' => 'Customer User',
            'email' => 'customer@customer.com',
            'password' => Hash::make('password')
        ]);

        // Assign roles to created users
        $admin->roles()->attach($adminRole);
        $manager->roles()->attach($managerRole);
        $employee->roles()->attach($employeeRole);
        $customer->roles()->attach($customerRole);
    }
}
