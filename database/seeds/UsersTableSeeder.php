<?php

use App\Models\User;
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
        factory(User::class, 15)->create();
        /*
        User::create([
            'name' => 'Lucas Vidoto',
            'email' => 'lucas@gmmail.com',
            'password' => bcrypt('123456'),
        ]);*/
    }
}
