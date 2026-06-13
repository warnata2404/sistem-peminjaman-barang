<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeminjamSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('peminjam')->insert([
            [
                'nama_peminjam' => 'Andi Saputra',
                'no_hp' => '081234567890',
                'alamat' => 'Jakarta',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_peminjam' => 'Budi Santoso',
                'no_hp' => '081234567891',
                'alamat' => 'Bekasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_peminjam' => 'Citra Dewi',
                'no_hp' => '081234567892',
                'alamat' => 'Depok',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_peminjam' => 'Dewi Lestari',
                'no_hp' => '081234567893',
                'alamat' => 'Tangerang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_peminjam' => 'Eko Prasetyo',
                'no_hp' => '081234567894',
                'alamat' => 'Bogor',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
