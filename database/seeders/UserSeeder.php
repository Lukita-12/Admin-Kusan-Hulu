<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       collect([
        [1, 'user','user','user@gmail.com','user1234','-'],
        // [1, 'user','userGmail.com','user1234','user','-'],
       ])->each(function ($item) {
        User::factory()->create([
            'id'         =>$item[0],
            'role'       =>$item[1],
            'name'       =>$item[2],
            'email'      =>$item[3],
            'password'   =>$item[4],
            'profile_pic'=>$item[5],
        ]);
       });
    }
}
