@extends('layouts.app')

@section('content')
<style>
    /* CSS untuk styling tabel pengguna */
    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        border-radius: 10px; /* Membuat sudut tabel melengkung */
        overflow: hidden; /* Untuk mencegah elemen melampaui border-radius */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Memberikan bayangan */
    }

    th, td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #ddd; /* Garis bawah untuk pemisahan */
    }

    th {
        background-color: #f8a5c2; /* Warna pink pastel pada header */
        color: white;
    }

    tr:nth-child(even) {
        background-color: #ffeefc; /* Warna pink muda untuk baris genap */
    }

    tr:hover {
        background-color: #ffccd5; /* Warna pink lembut saat hover */
    }

    /* Gaya untuk tombol */
    .btn-primary {
        margin-right: 5px;
        background-color: #ff6b81; /* Warna pink yang lebih terang untuk tombol */
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #ff4757; /* Lebih gelap saat hover */
    }

    .btn-danger {
        margin-left: 5px;
        background-color: #e74c3c; /* Warna merah pastel untuk tombol delete */
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .btn-danger:hover {
        background-color: #c0392b; /* Warna merah lebih gelap saat hover */
    }

    /* Responsif untuk layar kecil */
    @media screen and (max-width: 600px) {
        table {
            font-size: 0.9rem; /* Mengurangi ukuran font di layar kecil */
        }

        .btn-primary, .btn-danger {
            padding: 8px 10px;
            font-size: 0.8rem; /* Menyesuaikan ukuran tombol di layar kecil */
        }
    }

</style>

<h2 class="text-center">Daftar Pengguna</h2> <!-- Tambahkan judul dengan style center -->

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>NPM</th>
            <th>Kelas</th>
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
                    <!-- Tombol Edit -->
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-edit"></i> Edit
                    </a>

                    <!-- Tombol Delete dengan konfirmasi -->
                    <form action="{{ route('users.delete', $user->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash-alt"></i> Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
