<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Author;
use App\Models\Katalog;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Katalog::factory(20)->create();
        User::factory(5)->create();
        
        Category::create([
            'name' => 'Majalah',
            'slug' => 'majalah'
        ]);

        Category::create([
            'name' => 'Buku',
            'slug' => 'buku'
        ]);

        Author::create([
            'nama' => 'Enny Zakiyyah',
            'slug' => 'ennyzakiyyah'
        ]);
        Author::create([
            'nama' => 'Ana Wildatun',
            'slug' => 'anawildatun'
        ]);
    }
}
