<?php

namespace Database\Seeders;

use App\Models\Type;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $Admin = User::create([
            'name'=>'Admin',
            'email'=>'admin@gmail.com',
            'email_verified_at'=>now(),
            'password'=>Hash::make(123456789),
            'username'=>'Admin',
            'photo'=>'back/dist/img/author/default-img.png',
            'biography'=>'',
            'type'=>'3',
            'blocked'=>'0',
            'remember_token'=>Str::random(10),
        ]);

        $user = User::create([
            'name'=>'User',
            'email'=>'user@gmail.com',
            'email_verified_at'=>now(),
            'password'=>Hash::make(123456789),
            'username'=>'User',
            'photo'=>'back/dist/img/author/default-img.png',
            'biography'=>'',
            'type'=>'1',
            'blocked'=>'0',
            'remember_token'=>Str::random(10),
        ]);

        $vendor = User::create([
            'name'=>'vendor',
            'email'=>'vendor@gmail.com',
            'email_verified_at'=>now(),
            'password'=>Hash::make(123456789),
            'username'=>'vendor',
            'photo'=>'back/dist/img/author/default-img.png',
            'biography'=>'',
            'type'=>'2',
            'blocked'=>'0',
            'remember_token'=>Str::random(10),
        ]);

        $Roll = Type::create([
            'name'=>'User',
        ]);
        $Roll = Type::create([
            'name'=>'Vendor',
        ]);
        $Roll = Type::create([
            'name'=>'Admin',
        ]);



    }
}
