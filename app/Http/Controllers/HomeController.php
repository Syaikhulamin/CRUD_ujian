<?php

namespace App\Http\Controllers;

use App\Models\Student;

class HomeController extends Controller
{
    /**
     * Tampilkan halaman utama dengan ringkasan data siswa.
     */
    public function index()
    {
        $totalSiswa = Student::count();
        $jumlahLakiLaki = Student::where('jenis_kelamin', 'L')->count();
        $jumlahPerempuan = Student::where('jenis_kelamin', 'P')->count();

        return view('home', [
            'totalSiswa' => $totalSiswa,
            'jumlahLakiLaki' => $jumlahLakiLaki,
            'jumlahPerempuan' => $jumlahPerempuan,
        ]);
    }
}
