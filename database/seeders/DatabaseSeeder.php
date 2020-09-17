<?php

namespace Database\Seeders;

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
		User::create(['email' => 'greg@gregcave.com', 'password' => Hash::make('changeme'), 'email_verified_at' => '2019-11-26 14:29:20' ]);
	}
}

class UrlTableSeeder extends Seeder
{
    public function run()
	{
		$user = User::where('email','greg@gregcave.com')->first();
		
		Url::create([ 'user_id' => $user->id, 'url' => 'https://gregcave.com', 'link' => 'gregcave', 'visits' => 5 ]);
		Url::create([ 'user_id' => $user->id, 'url' => 'https://google.com', 'link' => 'google', 'visits' => 7 ]);
		Url::create([ 'user_id' => $user->id, 'url' => 'https://github.com', 'link' => 'github', 'visits' => 2 ]);
		Url::create([ 'user_id' => $user->id, 'url' => 'https://twitter.com', 'link' => 'twitter', 'visits' => 3 ]);
		Url::create([ 'user_id' => $user->id, 'url' => 'https://facebook.com', 'link' => 'facebook', 'visits' => 9 ]);
    }
}