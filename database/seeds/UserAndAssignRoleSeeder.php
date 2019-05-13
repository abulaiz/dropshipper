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
        if (!User::where('email', 'member@gmail.com')->exists()) {
            $user1 = new User();
            $user1->name = 'member';
            $user1->email = 'member@gmail.com';
            $user1->password = bcrypt('member1');
            $user1->save();
            $user1->assignRole('member');
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
            $user3->assignRole('admin');
        }
    }
}


