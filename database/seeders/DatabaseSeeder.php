<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Menonaktifkan pengecekan foreign key constraints
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        // Menghapus semua data dari tabel users
        DB::table('users')->truncate();

        // Memasukkan data pengguna ke dalam tabel users
        $users = [
            [
                'name' => 'Admin',
                'email' => 'adminpoliban@gmail.com',
                'password' => 'admin123',
                'role' => 'admin',
            ],
            [
                'name' => 'Pengajar',
                'email' => 'pengajar@gmail.com',
                'password' => 'pengajar123',
                'role' => 'pengajar',
            ],
            [
                'name' => 'Kaprodi',
                'email' => 'kaprodi@gmail.com',
                'password' => 'kaprodi123',
                'role' => 'kaprodi',
            ],
            [
                'name' => 'Kajur',
                'email' => 'kajur@gmail.com',
                'password' => 'kajur123',
                'role' => 'kajur',
            ],
        ];

        DB::table('users')->insert($users);

        // Mengaktifkan kembali pengecekan foreign key constraints
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
