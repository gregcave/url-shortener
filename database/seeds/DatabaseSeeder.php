<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Url;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
			UsersTableSeeder::class,
			UrlTableSeeder::class,
		]);
    }
}

class UsersTableSeeder extends Seeder
{
	public function run()
	{
		User::create(['first_name' => 'Greg', 'last_name' => 'Cave', 'password' => Hash::make('changeme'), 'email' => 'greg@gregcave.com', 'email_verified_at' => '2019-11-26 14:29:20' ]);
	}
}

class UrlTableSeeder extends Seeder
{
    public function run()
	{
		$user = User::where('email','greg@gregcave.com')->first();
		
		Url::create([ 'user_id' => $user->id, 'url' => 'https://gregcave.com', 'slug' => 'gregcave' ]);
    }
}