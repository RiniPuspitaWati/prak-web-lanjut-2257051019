@extends('layouts.app')

@section('content')
<style>
    /* CSS for styling the user table */
    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        box-shadow: 0 3px 12px rgba(0, 0, 0, 0.1); /* Enhanced shadow */
        border-radius: 8px;
        overflow: hidden;
    }

    th, td {
        padding: 18px 20px; /* Adjusted padding for cleaner look */
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #4a90e2; /* Richer blue for header */
        color: #fff;
        text-transform: uppercase;
        font-weight: bold;
        font-size: 15px;
    }

    td {
        background-color: #fff; /* White background for better contrast */
        color: #333;
        font-size: 14px;
    }

    tr:hover td {
        background-color: #f2f6fc; /* Softer hover effect for table rows */
        cursor: pointer;
    }

    /* Button styles */
    .btn-primary, .btn-danger, .btn-warning {
        padding: 10px 16px;
        font-size: 14px;
        border-radius: 6px;
        margin-right: 8px; /* Space between buttons */
        transition: background-color 0.3s ease;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1); /* Button shadow */
    }

    .btn-warning {
        background-color: #f39c12; /* Bright orange for detail button */
        color: white;
    }

    .btn-primary {
        background-color: #3498db; /* Clean blue for edit button */
        color: white;
    }

    .btn-danger {
        background-color: #e74c3c; /* Red for delete button */
        color: white;
    }

    .btn:hover {
        opacity: 0.9;
    }

    /* Image styling */
    img {
        max-width: 100px;
        height: auto;
        border-radius: 10px;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.15); /* Soft shadow for images */
    }

    /* Styling for the "List Data" heading */
    h2 {
        font-size: 32px;
        text-align: center;
        margin-bottom: 30px;
        font-weight: bold;
        color: #333;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* Button container */
    .btn-container {
        display: flex;
        justify-content: flex-start;
        margin-bottom: 20px;
    }

    /* Button for adding new users */
    .btn-primary-add {
        padding: 12px 20px;
        font-size: 16px;
        background-color: #28a745;
        color: white;
        border-radius: 6px;
        text-decoration: none;
        font-weight: bold;
        transition: background-color 0.3s ease;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2); /* Button shadow */
    }

    .btn-primary-add:hover {
        background-color: #218838;
    }

    /* Responsive table for smaller devices */
    @media (max-width: 768px) {
        table, th, td {
            font-size: 12px;
            padding: 12px;
        }
        .btn-primary-add {
            width: 100%;
            text-align: center;
        }
    }
</style>

<!-- Add New User button -->
<div class="btn-container">
    <a href="{{ route('users.create') }}" class="btn-primary-add">Tambah Pengguna Baru</a>
</div>

<!-- Table heading -->
<h2>List Data</h2>

<!-- Users table -->
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
                    <!-- Display image or placeholder text -->
                    @if($user->foto)
                        <img src="{{ asset($user->foto ?? 'uploads/img/default.jpg') }}" alt="Foto Pengguna">
                    @else
                        <span>Foto tidak tersedia</span>
                    @endif
                </td>
                <td>
                    <!-- Edit button -->
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>

                    <!-- Delete button -->
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                    </form>

                    <!-- View button -->
                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-warning">View</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
