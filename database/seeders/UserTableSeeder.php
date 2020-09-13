<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        $users = [
            [
                'name' => 'Roberto Grijalva',
                'email' => 'abc@abc.com',
                'password' => Hash::make('abcabcabcabc1'),
                'username' => 'rob',
                'phone' => '77777777',
                'birthday' => Carbon::create('1992', '11', '14')
            ],
            [
                'name' => 'Juan Perez',
                'email' => 'def@def.com',
                'password' => Hash::make('abcabcabcabc1'),
                'username' => 'juan',
                'phone' => '77888888',
                'birthday' => Carbon::create('2000', '1', '1')
            ],
            [
                'name' => 'Maria Garcia',
                'email' => 'hij@hij.com',
                'password' => Hash::make('abcabcabcabc1'),
                'username' => 'maria',
                'phone' => '77999999',
                'birthday' => Carbon::create('1980', '12', '1')
            ]
        ];

//        DB::table('users')->insert($users);

        foreach ($users as $user){
            User::create($user);
        }
    }
}
