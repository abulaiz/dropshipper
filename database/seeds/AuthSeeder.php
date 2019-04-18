<?php

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AuthSeeder extends Seeder
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

        $permissions = [

        	// Member Permissions

        	['name' => 'create_order_product', 'roles' => ['member']],
        	['name' => 'user_product_stock', 'roles' => ['member']],

        	['name' => 'hitory_order', 'roles' => ['member']],
        	['name' => 'cancel_order_request', 'roles' => ['member']],
        	['name' => 'order_receipt', 'roles' => ['member']],
        	['name' => 'order_request_progress', 'roles' => ['member']],

        	['name' => 'sending_request_list', 'roles' => ['member']],
        	['name' => 'add_sending_request', 'roles' => ['member']],
        	['name' => 'cancel_sending_request', 'roles' => ['member']],

        	// Admin & Superadmin Permissions

        	['name' => 'add_stock_product', 'roles' => ['admin', 'superadmin']],
        	['name' => 'product_stock_list', 'roles' => ['admin', 'superadmin']],
        	['name' => 'product_stock_history', 'roles' => ['admin', 'superadmin']],

        	['name' => 'confirm_order_payment', 'roles' => ['admin', 'superadmin']],
        	['name' => 'reject_order', 'roles' => ['admin', 'superadmin']],
        	['name' => 'request_order_list', 'roles' => ['admin', 'superadmin']],

        	['name' => 'request_sending_list', 'roles' => ['admin', 'superadmin']],
        	['name' => 'confirm_sending_payment', 'roles' => ['admin', 'superadmin']],
        	['name' => 'claim_product_has_sending', 'roles' => ['admin', 'superadmin']],
        	['name' => 'print_sending_receipt', 'roles' => ['admin', 'superadmin']],

        	// Superadmin Permission

        	['name' => 'view_order_last_update_status', 'roles' => ['superadmin']],
        	['name' => 'reject_sending_request', 'roles' => ['superadmin']],
        ];

        // Seed Role Data
        foreach ($roles as $value) {
        	if( !Role::where('name',$value)->exists() )
        		$role[$value] = Role::create(['name' => $value]);
        	else
        		$role[$value] = Role::findByName($value);
        }

        // Seed Permission Data
        foreach ($permissions as $item) {
        	if( !Permission::where('name', $item['name'])->exists() ){
        		$p =  Permission::create(['name' => $item['name']]);
        		foreach ($item['roles'] as $value) {
        			$p->assignRole( $role[$value] );	
        		}
        	}
        }
    }
}
