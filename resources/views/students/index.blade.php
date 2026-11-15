@extends('layouts.app')

@section('title', 'Data Siswa')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="mb-0">Data Siswa</h1>
        <a href="{{ url('/students/create') }}" class="btn btn-primary">Tambah Siswa</a>
    </div>

    <form method="GET" action="{{ route('students.index') }}" class="row g-2 mb-3">
        <div class="col-md-5">
            <input type="text" name="q" id="search-q" value="{{ $keyword }}" class="form-control" placeholder="Cari NIS, nama, atau email">
        </div>
        <div class="col-md-3">
            <select name="jenis_kelamin" class="form-select" onchange="this.form.submit()">
                <option value="">Semua jenis kelamin</option>
                <option value="L" @selected($jenisKelamin === 'L')>Laki-laki</option>
                <option value="P" @selected($jenisKelamin === 'P')>Perempuan</option>
            </select>
        </div>
        <div class="col-md-4">
            <button type="submit" class="btn btn-primary">Cari</button>
            <a href="{{ route('students.index') }}" class="btn btn-outline-secondary">Reset</a>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-primary">
                <tr>
                    <th width="50">No</th>
                    <th>NIS</th>
                    <th>Nama Lengkap</th>
                    <th>Jenis Kelamin</th>
                    <th>Email</th>
                    <th width="160">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($students as $student)
                    <tr>
                        <td>{{ $students->firstItem() + $loop->index }}</td>
                        <td>{{ $student->nis }}</td>
                        <td>{{ $student->nama_lengkap }}</td>
                        <td>{{ $student->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                        <td>{{ $student->email }}</td>
                        <td>
                            <a href="{{ url('/students/' . $student->id) }}" class="btn btn-sm btn-info" title="Detail">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ url('/students/' . $student->id . '/edit') }}" class="btn btn-sm btn-warning" title="Ubah">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('students.destroy', $student) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data siswa ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Data siswa tidak ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $students->links('pagination::bootstrap-5') }}
    </div>

    <script>
        (function () {
            const searchInput = document.getElementById('search-q');
            const form = searchInput ? searchInput.form : null;
            let timer = null;

            if (searchInput && form) {
                searchInput.addEventListener('input', function () {
                    clearTimeout(timer);
                    timer = setTimeout(function () {
                        form.submit();
                    }, 500);
                });
            }
        })();
    </script>
@endsection
