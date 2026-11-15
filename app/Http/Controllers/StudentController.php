<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    /**
     * Tampilkan daftar siswa dengan pencarian, filter, dan pagination.
     */
    public function index(Request $request)
    {
        $keyword = $request->input('q');
        $jenisKelamin = $request->input('jenis_kelamin');

        $students = Student::query()
            ->when($keyword, function ($query, $keyword) {
                $query->where(function ($subQuery) use ($keyword) {
                    $subQuery->where('nis', 'like', '%' . $keyword . '%')
                        ->orWhere('nama_lengkap', 'like', '%' . $keyword . '%')
                        ->orWhere('email', 'like', '%' . $keyword . '%');
                });
            })
            ->when($jenisKelamin, function ($query, $jenisKelamin) {
                $query->where('jenis_kelamin', $jenisKelamin);
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('students.index', [
            'students' => $students,
            'keyword' => $keyword,
            'jenisKelamin' => $jenisKelamin,
        ]);
    }

    /**
     * Tampilkan form tambah siswa.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Simpan siswa baru dengan validasi.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nis' => ['required', 'regex:/^[0-9]+$/', 'max:20', 'unique:students,nis'],
            'nama_lengkap' => ['required', 'max:100'],
            'jenis_kelamin' => ['required', 'in:L,P'],
            'tempat_lahir' => ['required', 'max:100'],
            'tanggal_lahir' => ['required', 'date', 'before_or_equal:today'],
            'alamat' => ['required'],
            'no_telp' => ['nullable', 'regex:/^[0-9]+$/', 'max:15'],
            'email' => ['required', 'email', 'max:100', 'unique:students,email'],
        ], [
            'required' => ':attribute wajib diisi.',
            'max' => ':attribute maksimal :max karakter.',
            'email' => ':attribute harus berformat email valid.',
            'date' => ':attribute harus berupa tanggal valid.',
            'before_or_equal' => ':attribute tidak boleh melebihi hari ini.',
            'regex' => ':attribute hanya boleh berisi angka.',
            'unique' => ':attribute sudah digunakan.',
            'in' => ':attribute tidak valid.',
        ], [
            'nis' => 'NIS',
            'nama_lengkap' => 'Nama Lengkap',
            'jenis_kelamin' => 'Jenis Kelamin',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'alamat' => 'Alamat',
            'no_telp' => 'Nomor Telepon',
            'email' => 'Email',
        ]);

        Student::create($validated);

        return redirect()->route('students.index')
            ->with('success', 'Data siswa berhasil ditambahkan.');
    }

    /**
     * Tampilkan detail satu siswa.
     */
    public function show(Student $student)
    {
        return view('students.show', [
            'student' => $student,
        ]);
    }

    /**
     * Tampilkan form ubah siswa.
     */
    public function edit(Student $student)
    {
        return view('students.edit', [
            'student' => $student,
        ]);
    }

    /**
     * Simpan perubahan data siswa.
     */
    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'nis' => ['required', 'regex:/^[0-9]+$/', 'max:20', Rule::unique('students', 'nis')->ignore($student->id)],
            'nama_lengkap' => ['required', 'max:100'],
            'jenis_kelamin' => ['required', 'in:L,P'],
            'tempat_lahir' => ['required', 'max:100'],
            'tanggal_lahir' => ['required', 'date', 'before_or_equal:today'],
            'alamat' => ['required'],
            'no_telp' => ['nullable', 'regex:/^[0-9]+$/', 'max:15'],
            'email' => ['required', 'email', 'max:100', Rule::unique('students', 'email')->ignore($student->id)],
        ], [
            'required' => ':attribute wajib diisi.',
            'max' => ':attribute maksimal :max karakter.',
            'email' => ':attribute harus berformat email valid.',
            'date' => ':attribute harus berupa tanggal valid.',
            'before_or_equal' => ':attribute tidak boleh melebihi hari ini.',
            'regex' => ':attribute hanya boleh berisi angka.',
            'unique' => ':attribute sudah digunakan.',
            'in' => ':attribute tidak valid.',
        ], [
            'nis' => 'NIS',
            'nama_lengkap' => 'Nama Lengkap',
            'jenis_kelamin' => 'Jenis Kelamin',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'alamat' => 'Alamat',
            'no_telp' => 'Nomor Telepon',
            'email' => 'Email',
        ]);

        $student->update($validated);

        return redirect()->route('students.index')
            ->with('success', 'Data siswa berhasil diubah.');
    }

    /**
     * Hapus data siswa.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')
            ->with('success', 'Data siswa berhasil dihapus.');
    }
}
