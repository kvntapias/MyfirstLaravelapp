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
        User::Create([
            'name'=>'Kevin',
            'email'=>'kvn@kvn.com',
            'password'=> bcrypt('kvntapias')
        ]);

    }
}
