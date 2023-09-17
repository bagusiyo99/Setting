<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
use App\Models\Pesan;
use App\Models\Jurusan;
use App\Models\Pengaturan;
use App\Models\Portofolio;
use Illuminate\Database\Seeder;

use Database\Factories\BlogFactory;
use Database\Seeders\BannnerSeeder;
use Database\Factories\PesanFactory;
use Database\Factories\JurusanFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin', 
            'email' => 'admin@gmail.com', 
            'akses' => 'operator', 
            'email_verified_at' => now(),
            'password' => '$2y$10$sn0xQzfI87OuIWY0Pc4mquMPkCbF2Xqqv4IRWOPr.0LaY7/eZ8exC', // 12345
        ]);

        
        Pengaturan::factory(1)->create([
            'judul' => 'a', 
            'deskripsi' => 'a', 
            'visi' => 'a', 
            'misi' => 'a', 
            'alamat' => 'a', 
            'hp' => 'a', 
        ]);

            Portofolio::factory(1)->create([
            'judul' => 'a', 
            'deskripsi' => 'a', 
        ]);


    }

    protected $seeders = [
    // BlogSeeder::class,
    // BannnerSeeder::class,
    // UsersTableSeeder::class,
    // Sebuah seeder lainnya jika ada
];
    
    // Tentukan properti $factories di luar metode run
    // protected $factories = [

    //      PesanSeeder::class => PesanFactory::class,
    //      JurusanSeeder::class => JurusanFactory::class,
    //      BlogSeeder::class => BlogFactory::class,
    // ];
}
