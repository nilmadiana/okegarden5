<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
            'username' => 'gardener',
            'name'=>'ini akun gardener',
            'email'=>'gardener@example.com',
            'level'=>'gardener',
            'password'=> bcrypt('gardener'),
            ],
            [
            'username' => 'designer',
            'name'=>'ini akun designer',
            'email'=>'designer@example.com',
            'level'=>'designer',
            'password'=> bcrypt('designer'),
            ],
            [
            'username' => 'user',
            'name'=>'ini akun User (non admin)',
            'email'=>'user@example.com',
            'level'=>'user',
            'password'=> bcrypt('user'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
