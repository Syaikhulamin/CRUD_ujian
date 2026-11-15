<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /**
     * Kolom yang boleh diisi massal.
     */
    protected $fillable = [
        'nis',
        'nama_lengkap',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'no_telp',
        'email',
    ];

    /**
     * Casting kolom ke tipe yang sesuai.
     */
    protected function casts(): array
    {
        return [
            'tanggal_lahir' => 'date',
        ];
    }
}
