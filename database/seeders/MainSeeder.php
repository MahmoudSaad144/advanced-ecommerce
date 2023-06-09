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


        $Admin = User::updateOrCreate([
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

        $user = User::updateOrCreate([
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

        $vendor = User::updateOrCreate([
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

        for($i = 0;$i <= 100;$i++) {

            $vendor = User::updateOrCreate([
                'name'=>fake()->name,
                'email'=>fake()->name.Str::random(3).'@gmail.com',
                'email_verified_at'=>now(),
                'password'=>Hash::make(123456789),
                'username'=>fake()->name.Str::random(3),
                'photo'=>'back/dist/img/author/default-img.png',
                'biography'=>fake()->text,
                'type'=>'2',
                'blocked'=>'0',
                'remember_token'=>Str::random(10),
            ]);
        }

        $Roll = Type::updateOrCreate([
            'name'=>'User',
        ]);
        $Roll = Type::updateOrCreate([
            'name'=>'Vendor',
        ]);
        $Roll = Type::updateOrCreate([
            'name'=>'Admin',
        ]);

    }
}
