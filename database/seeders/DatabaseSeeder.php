<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use App\Models\Pesan;
use Database\Factories\BlogFactory;
use Illuminate\Database\Seeder;

use Database\Factories\JurusanFactory;
use Database\Factories\PesanFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


    }
    
    // Tentukan properti $factories di luar metode run
    protected $factories = [

         PesanSeeder::class => PesanFactory::class,
         JurusanSeeder::class => JurusanFactory::class,
         BlogSeeder::class => BlogFactory::class,
    ];
}
