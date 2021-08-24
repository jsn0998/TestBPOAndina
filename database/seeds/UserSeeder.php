<?php
use App\User;
use App\ProfessionModel2 as Profesion;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$profession4 = DB::select('SELECT id FROM profession WHERE profession = ?',['Desarrollador back-end']);

    	//$profession = DB::table('profession')->select('id')->first();
    	$professionId = Profesion::where('profession','Desarrollador back-end')->value('id');
    	//$profession2 = DB::table('profession')->select('id','profession')->where('profession','=','Desarrollador back-end')->first();

    	//$profession3 = DB::table('profession')->select('id','profession')->where('profession','Desarrollador back-end')->first();

        // DB::table('users')->insert([
        // 	'name'=>'Pedro',
        // 	'email'=>'pedro@hotmail.com',
        // 	'password'=> bcrypt('laravel'),
        // 	'profession_id' => $profession->id,
        // ]);

        // User::create([
        // 	'name'=>'Pedro',
        // 	'email'=>'pedro@hotmail.com',
        // 	'password'=> bcrypt('laravel'),
        // 	'profession_id' => $professionId,
        // 	'is_admin'=> true,
        // ]);

        // User::create([
        // 	'name'=>'Juan',
        // 	'email'=>'juan@hotmail.com',
        // 	'password'=> bcrypt('laravel2'),
        // 	'profession_id' => $professionId,
        // 	'is_admin'=> true,
        // ]);

        // User::create([
        // 	'name'=>'Gabriel',
        // 	'email'=>'gabriel@hotmail.com',
        // 	'password'=> bcrypt('laravel3'),
        // 	'profession_id' => $professionId,
        // 	'is_admin'=> false,
        // ]);


        factory(User::class)->create([
        	'email'=>'gabriel@hotmail.com',
        	'password'=> bcrypt('laravel3'),
        	'profession_id' => $professionId,
        	'is_admin'=> false,
        ]);

        factory(User::class)->create([
        	'profession_id' => $professionId,
        	'is_admin'=> true,
        ]);

        factory(User::class,10)->create();
    }
}
