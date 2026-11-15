@extends('layouts.app')

@section('title', 'Tambah Siswa')

@section('content')
    <h1 class="mb-4">Tambah Siswa</h1>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('students.store') }}">
                        @csrf
                        @include('students._form')

                        <div class="d-flex justify-content-end gap-2">
                            <button type="submit" id="submit-button" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('students.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.querySelector('form');
            const button = document.getElementById('submit-button');
            if (form && button) {
                form.addEventListener('submit', function () {
                    button.disabled = true;
                    button.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Menyimpan...';
                });
            }
        });
    </script>
@endsection
