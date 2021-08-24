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
        // $this->call(UsersTableSeeder::class);
        // DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        // DB::table('profession')->truncate();
        // DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        $this->truncateTables([
        	'users',
        	'profession',
        ]);

        $this->call(ProfessionSeeder::class);
        $this->call(UserSeeder::class);
    }

    protected function truncateTables(array $tables){
    	DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

    	foreach($tables as $table){
    		DB::table($table)->truncate();
    	}

    	DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

    }
}
