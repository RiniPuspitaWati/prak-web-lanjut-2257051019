@extends('layouts.app')

@section('content')
<style>
    /* CSS untuk styling tabel pengguna */
    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Shadow for the table */
    }

    th, td {
        padding: 15px 20px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #4f9ec4; /* Warna biru medium */
        color: #fff; /* Warna teks header putih */
        text-transform: uppercase; /* Uppercase text for header */
        font-weight: 600;
    }

    td {
        background-color: #f9f9f9; /* Light gray for table rows */
        color: #333;
        font-size: 14px;
        font-weight: 500;
    }

    tr:hover td {
        background-color: #f1f1f1; /* Warna saat hover pada row */
    }

    /* Gaya untuk tombol */
    .btn-primary, .btn-danger, .btn-warning {
        padding: 8px 16px; /* Ukuran tombol seragam */
        font-size: 14px; /* Ukuran font */
        margin-right: 5px; /* Spasi antar tombol */
        border-radius: 5px; /* Rounded corners for buttons */
        transition: background-color 0.3s ease; /* Smooth transition */
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Soft shadow */
    }

    .btn-warning {
        background-color: #ffcc00; /* Warna khusus untuk tombol Detail */
        color: white;
    }

    .btn-primary {
        background-color: #4f9ec4; /* Warna biru untuk tombol Edit */
        color: white;
    }

    .btn-danger {
        background-color: #d9534f; /* Warna merah untuk tombol Hapus */
        color: white;
    }

    .btn:hover {
        opacity: 0.85;
        cursor: pointer;
    }

    /* Gaya untuk gambar */
    img {
        max-width: 100px; /* Maksimal lebar gambar */
        height: auto; /* Menyesuaikan tinggi gambar secara proporsional */
        border-radius: 10px; /* Rounded corners for images */
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Soft shadow for images */
    }

    /* Styling for the "List Data" heading */
    h2 {
        font-size: 28px;
        text-align: center;
        margin-bottom: 20px;
        font-weight: bold;
        color: #333;
        text-transform: uppercase;
        letter-spacing: 1.5px;
    }

    /* Centering the "Tambah Pengguna Baru" button */
    .btn-container {
        display: flex;
        justify-content: flex-start;
        margin-bottom: 20px;
    }

    /* Styling for the "Tambah Pengguna Baru" button */
    .btn-primary-add {
        padding: 10px 20px;
        font-size: 16px;
        background-color: #28a745;
        color: white;
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    .btn-primary-add:hover {
        background-color: #218838;
    }
</style>

<!-- Container for "Tambah Pengguna Baru" button -->
<div class="btn-container">
    <a href="{{ route('users.create') }}" class="btn-primary-add">Tambah Pengguna Baru</a>
</div>

<!-- "List Data" heading -->
<h2>List Data</h2>

<!-- Table for users data -->
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>NPM</th>
            <th>Kelas</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->nama }}</td>
                <td>{{ $user->npm }}</td>
                <td>{{ $user->kelas->nama_kelas ?? 'Kelas Tidak Ditemukan' }}</td>
                <td>
                    <!-- Menampilkan gambar jika ada, jika tidak menampilkan pesan 'Tidak ada gambar' -->
                    @if($user->foto)
                        <img src="{{ asset($user->foto ?? 'uploads/img/default.jpg') }}" alt="Foto Pengguna">
                    @else
                        <span>Foto tidak tersedia</span>
                    @endif
                </td>
                <td>
                    <!-- Tombol Edit -->
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>

                    <!-- Tombol Hapus -->
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                    </form>

                    <!-- Tombol Detail dengan ukuran yang sama dengan Edit dan Delete -->
                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-warning">View</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
