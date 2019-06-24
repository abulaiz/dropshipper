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
            $user1->name = 'Alfian S';
            $user1->email = 'member@gmail.com';
            $user1->gender = '1';
            $user1->address = "Jl Karapitan";
            $user1->phone = "089214124214";
            $user1->activate = true;
            $user1->password = bcrypt('member1');
            $user1->save();
            $user1->assignRole('member');
        }

        if (!User::where('email', 'mimin@gmail.com')->exists()) {
            $user2 = new User();
            $user2->name = 'Jhon Snow';
            $user2->email = 'mimin@gmail.com';
            $user2->gender = '1';
            $user2->address = 'Jl Pamanukan';
            $user2->phone = '0819842203423';
            $user2->activate = true;
            $user2->password = bcrypt('mimin1');
            $user2->save();
            $user2->assignRole('superadmin');
        }

        if (!User::where('email', 'admin1@gmail.com')->exists()) {
            $user3 = new User();
            $user3->name = 'Dhea A';
            $user3->email = 'admin1@gmail.com';
            $user3->gender = '0';
            $user3->address = 'Jl Jalan';
            $user3->phone = '0821342243234';
            $user3->activate = true;
            $user3->password = bcrypt('admin2');
            $user3->save(); 
            $user3->assignRole('admin');
        }
    }
}


