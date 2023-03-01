<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

// Models
use App\Models\User;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $guru = [
            [
                'name' => 'Theo',
                'email' => 'theo@gmail.com',
                'role' => 'guru',
                'mapel' => 'Laravel',
                'password' => Hash::make('123')
            ],
            [
                'name' => 'Nalsal',
                'email' => 'nalsal@gmail.com',
                'role' => 'guru',
                'mapel' => 'MTK',
                'password' => Hash::make('123')
            ],
            [
                'name' => 'Dion',
                'email' => 'dion@gmail.com',
                'role' => 'guru',
                'mapel' => 'Kimia',
                'password' => Hash::make('123')
            ],
            [
                'name' => 'Miki',
                'email' => 'miki@gmail.com',
                'role' => 'guru',
                'mapel' => 'Biologi',
                'password' => Hash::make('123')
            ],
            [
                'name' => 'Brian',
                'email' => 'brian@gmail.com',
                'role' => 'guru',
                'mapel'=> 'Jepang', 
                'password' => Hash::make('123')
            ],
        ];

        foreach($guru as $guruu => $value){
            User::create($value);
        }
    }
}