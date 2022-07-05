<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Author;
use App\Models\Lokasi;
use App\Models\Status;
use App\Models\Katalog;
use App\Models\Category;
use App\Models\Condition;
use App\Models\Informasi;
use App\Models\Koleksidigital;
use App\Models\Label;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        Author::create([
            'nama' => 'Enny Zakiyyah',
            'slug' => 'ennyzakiyyah'
        ]);
        Author::create([
            'nama' => 'Ana Wildatun',
            'slug' => 'anawildatun'
        ]);
        
        Category::create([
            'name' => 'Majalah',
            'slug' => 'majalah'
        ]);
        
        Category::create([
            'name' => 'Buku',
            'slug' => 'buku'
        ]);
        Lokasi::create([
            'nama' => 'Perpustakaan Akademi Komunitas Adiyasa'
        ]);

        Lokasi::create([
            'nama' => 'Perpustakaan LSP/Training'
        ]);

        Lokasi::create([
            'nama' => 'Perpustakaan Program'
        ]);

        Label::create([
            'name' => 'Katalog',
            'slug' => 'katalog'
        ]);

        Label::create([
            'name' => 'Bibliography',
            'slug' => 'bibliography'
        ]);

        Condition::create([
            'nama' => 'Hilang'
        ]);

        Condition::create([
            'nama' => 'Rusak'
        ]);
        Condition::create([
            'nama' => 'Bagus'
        ]);
        Katalog::factory(20)->create();
        Koleksidigital::factory(5)->create();

        // $user = User::create([
        //     'name' => 'Enny Zakiyyah',
        //     'no_ktp' => '438487325238',
        //     'tempat_lahir' => 'Pamekasan',
        //     'tgl_lahir' => '11 Oktober 1999',
        //     'username' => 'ennyzakiyyah',
        //     'email' => 'enny.9h08@gmail.com',
        //     'email_verified_at' => now(),
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        //     'no_tlpn' => '98493493',
        //     'alamat' => 'Pamekasan' ,
        //     'image' => '0',
        //     'remember_token' => '',
        // ]);

        // $user->assignRole('admin');
        

       

        Informasi::create([
            'nama' => 'Libur Nata',
            'slug' => 'libur-natal',
            'tanggal' => '2022-06-16',
            'informasi' => 'Libur Natal'
        ]);

        

        Status::create([
            'nama' => 'Kembali'
        ]);

        Status::create([
            'nama' => 'Sedang Dipinjam'
        ]);

        Status::create([
            'nama' => 'Pending'
        ]);

        Status::create([
            'nama' => 'Konfirmasi'
        ]);

        Status::create([
            'nama' => 'Ditolak'
        ]);

        

    }
}
