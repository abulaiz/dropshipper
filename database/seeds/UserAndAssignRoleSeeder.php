<?php

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use App\User;

class UserAndAssignRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!User::where('email', 'admin@gmail.com')->exists()) {
            $user1 = new User();
            $user1->name = 'admin';
            $user1->email = 'admin@gmail.com';
            $user1->password = bcrypt('admin1');
            $user1->save();
            $user1->assignRole('admin');
        }

        if (!User::where('email', 'mimin@gmail.com')->exists()) {
            $user2 = new User();
            $user2->name = 'mimin';
            $user2->email = 'mimin@gmail.com';
            $user2->password = bcrypt('mimin1');
            $user2->save();
            $user2->assignRole('superadmin');
        }

        if (!User::where('email', 'admin1@gmail.com')->exists()) {
            $user3 = new User();
            $user3->name = 'admin1';
            $user3->email = 'admin1@gmail.com';
            $user3->password = bcrypt('admin2');
            $user3->save();
            $user3->assignRole('member');
        }
    }
}


