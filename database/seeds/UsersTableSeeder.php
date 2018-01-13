<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Muharram Syah';
        $user->email = 'muharramsyah19@gmail.com';
        $user->password = bcrypt('muharram19');
        $user->gender = 'male';
        $user->address = 'Jalan Kh. Syahdan No. 68 A, Jakarta';
        $user->picture = 'muharram.jpg';
        $user->phone = '081361984556';
        $user->save();
    }
}
