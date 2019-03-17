<?php
use Carbon\Carbon;
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
        DB::table('users')->insert([
        	[
            	'firstname' => 'Darinel',
            	'lastname' => 'Valencia',
            	'email' => 'darinel.valencia@unach.mx',
            	'description' => 'Darinel Valencia, administrador de sistemas UNACH',
            	'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            	'password' => bcrypt('qwerty'),
            	'remember_token' => '',
            	'active' => 1,
            	'image' => '',
            	'role_id' => 1,
            	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            	'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);
    }
}
