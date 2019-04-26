<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	// Seed Permission and Role
    	$this->command->info('Seeding Permission and Role ...');
        $this->call(AuthSeeder::class);
        $this->call(UserAndAssignRoleSeeder::class);
        $this->call(ProductSeeder::class);
    }
}
