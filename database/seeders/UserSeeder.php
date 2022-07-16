<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $admin = User::create([
            'name' => 'Enny Zakiyyah',
            'no_ktp' => '438487325238',
            'tempat_lahir' => 'Pamekasan',
            'tgl_lahir' => '2022-06-15',
            'username' => 'ennyzakiyyah',
            'email' => 'enny.9h08@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'no_tlpn' => '98493493',
            'alamat' => 'Pamekasan' ,
            'image_bukti' => '0',
            'image_foto' => '0',
            'jk' => 'Perempuan',
            'unit_kerja' => 'Mahasiswa',
            'remember_token' => 'wer3r32',
            // 'is_admin' => ''
        ]);

        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'Nyza',
            'no_ktp' => '4834738',
            'tempat_lahir' => 'Pamekasan',
            'tgl_lahir' => '2022-06-15',
            'username' => 'nyza',
            'email' => 'nyza.9h08@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'no_tlpn' => '98493493',
            'alamat' => 'Pamekasan' ,
            'image_bukti' => '0',
            'image_foto' => '0',
            'jk' => 'Perempuan',
            'unit_kerja' => 'Staf Proyek',
            'remember_token' => 'wwwewef',
            // 'is_admin' => ''
        ]);

        $user->assignRole('user');

    }
}
