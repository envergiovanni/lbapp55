<?php

use App\User;
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
        User::truncate();

        $user = new User;
        $user->name = 'Enver Giovanni';
        $user->email = 'admin@lbapp55.test';
        $user->password = bcrypt('admin');
        $user->save();
    }
}
