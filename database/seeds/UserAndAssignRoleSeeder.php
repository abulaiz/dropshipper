<?php

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use App\User;
use Illuminate\Support\Str;

class UserAndAssignRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $roles = ['admin', 'superadmin', 'member'];
       $role = [
       		'admin' => null,
        	'superadmin' => null,
        	'member' => null
       ];

       $users = [
       		// Member -> User

        	['name' => 'create_order_product', 'roles' => ['member']],
        	['name' => 'user_product_stock', 'roles' => ['member']],


        	// Admin & Superadmin -> User

        	['name' => 'add_stock_product', 'roles' => ['admin', 'superadmin']],
        	['name' => 'product_stock_list', 'roles' => ['admin', 'superadmin']],
        	['name' => 'product_stock_history', 'roles' => ['admin', 'superadmin']],

        	// Superadmin -> User

        	['name' => 'view_order_last_update_status', 'roles' => ['superadmin']],
        	['name' => 'reject_sending_request', 'roles' => ['superadmin']],
       ];

       //Seed Role Data
       foreach ($roles as $value) {
       		if( !Role::where('name',$value)->exists() )
        		$role[$value] = Role::create(['name' => $value]);
        	else
        		$role[$value] = Role::findByName($value);
        	}

		//Seed User Data
        foreach ($users as $item) {
        	if( !User::where('name', $item['name'])->exists() ){
        		$p =  User::create(['name' => $item['name'],
        							'email' => Str::random(10).'@gmail.com', 
        							'password' => bcrypt('secret')
        						  ]);
        		foreach ($item['roles'] as $value) {
        			$p->assignRole( $role[$value] );	
        		}
        	}
        }
    }
}
