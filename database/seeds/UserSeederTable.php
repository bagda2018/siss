php<?php

use Illuminate\Database\Seeder;
use App\User;
class UserSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            ['username'=> 'nicodemos.mateus',
            'email' => 'nimeuri@hotmail.com',
            'password'=> bcrypt('bagda@2018') ],
            
            ['username'=> 'antonio.malengue',
            'email' => 'malengue@hotmail.com',
            'password'=> bcrypt('bagda@2018') ],
            
            ['username'=> 'zenaide.barbosa',
            'email' => 'zenaide@hotmail.com',
            'password'=> bcrypt('bagda@2018') ],
            
            ['username'=> 'mausa.jose',
            'email' => 'mause@hotmail.com',
            'password'=> bcrypt('bagda@2018') ]
        );
    }
}
