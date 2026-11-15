<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Isi data contoh siswa untuk keperluan demo.
     */
    public function run(): void
    {
        $students = [
            [
                'nis' => '20240001',
                'nama_lengkap' => 'Ahmad Fauzi',
                'jenis_kelamin' => 'L',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '2008-03-12',
                'alamat' => 'Jl. Merdeka No. 1, Jakarta',
                'no_telp' => '081234567890',
                'email' => 'ahmad.fauzi@example.com',
            ],
            [
                'nis' => '20240002',
                'nama_lengkap' => 'Siti Nurhaliza',
                'jenis_kelamin' => 'P',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '2008-07-25',
                'alamat' => 'Jl. Asia Afrika No. 2, Bandung',
                'no_telp' => '082345678901',
                'email' => 'siti.nurhaliza@example.com',
            ],
            [
                'nis' => '20240003',
                'nama_lengkap' => 'Budi Santoso',
                'jenis_kelamin' => 'L',
                'tempat_lahir' => 'Surabaya',
                'tanggal_lahir' => '2007-11-08',
                'alamat' => 'Jl. Pemuda No. 3, Surabaya',
                'no_telp' => null,
                'email' => 'budi.santoso@example.com',
            ],
            [
                'nis' => '20240004',
                'nama_lengkap' => 'Dewi Lestari',
                'jenis_kelamin' => 'P',
                'tempat_lahir' => 'Yogyakarta',
                'tanggal_lahir' => '2008-01-30',
                'alamat' => 'Jl. Malioboro No. 4, Yogyakarta',
                'no_telp' => '083456789012',
                'email' => 'dewi.lestari@example.com',
            ],
            [
                'nis' => '20240005',
                'nama_lengkap' => 'Rizky Pratama',
                'jenis_kelamin' => 'L',
                'tempat_lahir' => 'Semarang',
                'tanggal_lahir' => '2007-09-18',
                'alamat' => 'Jl. Pandanaran No. 5, Semarang',
                'no_telp' => '084567890123',
                'email' => 'rizky.pratama@example.com',
            ],
        ];

        foreach ($students as $data) {
            Student::create($data);
        }
    }
}
