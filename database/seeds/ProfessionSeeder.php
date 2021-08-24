<?php

use App\ProfessionModel2 as Profesion;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profesion::create([
    		'profession' => 'Desarrollador back-end',
    		]);

        Profesion::create([
            'profession' => 'Desarrollador front-end',
            ]);

        Profesion::create([
            'profession' => 'Doctor',
            ]);

    	// DB::insert('INSERT INTO profession (profession) VALUES (:llave1)',[
    	// 	'llave1'=>'Desarrollador back-end',
    	// ]);

    	//DB::insert('INSERT INTO profession (profession) VALUES (?)',['Desarrollador back-end',]);

    	// DB::table('profession')->insert([
    	// 	'profession'=>'Desarrollador back-end',

    	// ]);

    	// DB::table('profession')->insert([
    	// 	'profession'=>'Desarrollador front-end',

    	// ]);

    	// DB::table('profession')->insert([
    	// 	'profession'=>'Seguridad informatica',

    	// ]);

        factory(Profesion::class,12)->create();

    }
}
