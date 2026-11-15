@extends('layouts.app')

@section('title', 'Detail Siswa')

@section('content')
    <h1 class="mb-4">Detail Siswa</h1>

    <div class="card">
        <div class="card-body">
            <table class="table table-borderless">
                <tr>
                    <th width="180">NIS</th>
                    <td>{{ $student->nis }}</td>
                </tr>
                <tr>
                    <th>Nama Lengkap</th>
                    <td>{{ $student->nama_lengkap }}</td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td>{{ $student->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                </tr>
                <tr>
                    <th>Tempat Lahir</th>
                    <td>{{ $student->tempat_lahir }}</td>
                </tr>
                <tr>
                    <th>Tanggal Lahir</th>
                    <td>{{ $student->tanggal_lahir->format('d-m-Y') }}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>{{ $student->alamat }}</td>
                </tr>
                <tr>
                    <th>Nomor Telepon</th>
                    <td>{{ $student->no_telp ?: '-' }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $student->email }}</td>
                </tr>
            </table>

            <div class="d-flex justify-content-end">
                <a href="{{ route('students.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
@endsection
