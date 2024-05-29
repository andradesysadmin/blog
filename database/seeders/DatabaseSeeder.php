<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Criando o unico usuario q o sistema tera
        $user = new User();
        $user->name = 'Gabriel Andrade';
        $user->password = Hash::make('galileia'); 
        $user->save();
    }
}
