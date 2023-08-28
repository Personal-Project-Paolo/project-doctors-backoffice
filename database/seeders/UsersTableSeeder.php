<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = config('users');

        foreach ($users as $arrUsers){
            $user = User::create([
                                
                "email"            => $arrUsers ['email'],
                "password"         => Hash::make('password'),
                "name"             => $arrUsers ['name'],
                "lastname"         => $arrUsers ['lastname'],
                "address"          => $arrUsers ['address'],
                
            ]);
            $user->specializations()->sync($arrUsers['specializations']);
        }
        
    }
}
