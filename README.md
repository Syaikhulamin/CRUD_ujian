# Aplikasi Manajemen Data Siswa

Aplikasi web sederhana untuk menyimpan, menampilkan, mencari, mengubah, dan menghapus data siswa menggunakan Laravel, Blade, Bootstrap 5, dan SQLite.

## Fitur

- Halaman utama dengan ringkasan total siswa, jumlah laki-laki, dan jumlah perempuan
- Daftar siswa dengan pagination 10 data per halaman
- Pencarian berdasarkan NIS, nama lengkap, atau email
- Filter berdasarkan jenis kelamin
- Form tambah dan ubah data siswa dengan validasi
- Halaman detail siswa
- Hapus data siswa dengan konfirmasi
- Flash message setelah tambah, ubah, dan hapus

## Teknologi

- PHP 8.3+
- Laravel 13
- SQLite
- Blade
- Bootstrap 5 (CDN)

## Struktur Penting

```text
app/Http/Controllers/HomeController.php
app/Http/Controllers/StudentController.php
app/Models/Student.php
database/migrations/2026_11_14_162243_create_students_table.php
database/seeders/StudentSeeder.php
resources/views/layouts/app.blade.php
resources/views/home.blade.php
resources/views/students/
routes/web.php
```

## Instalasi

1. Masuk ke folder project:

   ```bash
   cd data-siswa
   ```

2. Install dependensi PHP:

   ```bash
   composer install
   ```

3. Salin file environment:

   ```bash
   cp .env.example .env
   ```

4. Generate application key:

   ```bash
   php artisan key:generate
   ```

5. Pastikan `DB_CONNECTION=sqlite` pada `.env`.

6. Buat file database SQLite jika belum ada:

   ```bash
   touch database/database.sqlite
   ```

7. Jalankan migration dan seeder:

   ```bash
   php artisan migrate --seed
   ```

8. Jalankan aplikasi:

   ```bash
   php artisan serve
   ```

9. Buka `http://127.0.0.1:8000`.

## Reset Database

```bash
php artisan migrate:fresh --seed
```

## Daftar Route

- `GET /` - Halaman utama
- `GET /students` - Daftar siswa
- `GET /students/create` - Form tambah siswa
- `POST /students` - Simpan siswa baru
- `GET /students/{student}` - Detail siswa
- `GET /students/{student}/edit` - Form ubah siswa
- `PUT /students/{student}` - Simpan perubahan
- `DELETE /students/{student}` - Hapus siswa

## Catatan

- NIS hanya boleh berisi angka dan tidak boleh duplikat.
- Email harus valid dan tidak boleh duplikat.
- Tanggal lahir tidak boleh melebihi hari ini.
- Nomor telepon bersifat opsional, tetapi jika diisi hanya boleh berisi angka.
