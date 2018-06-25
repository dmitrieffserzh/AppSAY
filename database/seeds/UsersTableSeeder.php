<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    $x=0;
	    while ($x<50) {
		    $x++;
		    DB::table('users')->insert([
			    'nickname' => str_random(10),
			    'email' => str_random(10). '@gmail.com',
			    'password' => bcrypt('dmitriev'),
			    'role' => 'user',
		    ]);
		    DB::table('profiles')->insert([
			    'user_id' => $x,
			    'name' => str_random(10),
			    'surname' => str_random(10),
			    'sex' => rand(1, 2),
		    ]);
	    }
    }
}
