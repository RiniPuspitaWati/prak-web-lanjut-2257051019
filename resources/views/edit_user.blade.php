<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User_PWL</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #74ebd5, #ACB6E5); /* Background gradient */
        }
        .container {
            background-color: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
            width: 700px; /* Increased width for a wider form */
            text-align: center;
        }
        h1 {
            color: #333;
            font-size: 30px;
            font-weight: 600;
            margin-bottom: 30px;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .form-group {
            width: 100%;
            margin-bottom: 20px;
            text-align: left;
        }
        label {
            font-weight: 600;
            margin-bottom: 5px;
            color: #333;
            font-size: 16px;
            display: block;
        }
        input, select, .file-input {
            width: 100%;
            padding: 14px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s ease;
            box-sizing: border-box;
        }
        input:focus, select:focus, .file-input:focus {
            border-color: #28a745;
            box-shadow: 0 0 8px rgba(40, 167, 69, 0.5);
            outline: none;
        }
        input:hover, select:hover, .file-input:hover {
            border-color: #999;
        }
        .file-input {
            padding: 8px; /* Ensure file input has a consistent padding */
            height: 50px;
        }
        .button-container {
            display: flex;
            justify-content: space-between;
            width: 100%;
            gap: 10px;
        }
        button, .btn-back {
            padding: 14px 0;
            font-size: 18px;
            font-weight: 600;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            flex: 1; /* Ensure both buttons take equal width */
        }
        button {
            background-color: #28a745;
            color: white;
        }
        button:hover {
            background-color: #218838;
            transform: scale(1.05);
        }
        .btn-back {
            background-color: #f39c12;
            color: white;
        }
        .btn-back:hover {
            background-color: #e67e22;
        }
        img {
            margin-top: 10px;
            border-radius: 10px;
        }
        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                width: 90%;
                padding: 20px;
            }
            input, select, button, .btn-back {
                font-size: 14px;
                padding: 12px;
            }
        }
    </style>
</head>
@extends('layouts.app')
@section('content')

<div class="container mt-5">
    <h1 class="text-center">Edit Data</h1>
    <form action="{{ route('user.update', $user['id']) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" class="form-control" name="nama" id="nama" value="{{ old('nama', $user->nama) }}" placeholder="Masukkan Nama">
        </div>
        <div class="form-group">
            <label for="npm">NPM:</label>
            <input type="text" class="form-control" name="npm" id="npm" value="{{ old('npm', $user->npm) }}" placeholder="Masukkan NPM">
        </div>
        <div class="form-group">
            <label for="kelas_id">Kelas:</label>
            <select class="form-select" name="kelas_id" id="kelas_id" required>
                <option value="" disabled selected>Pilih Kelas</option>
                @foreach ($kelas as $kelasItem)
                    <option value="{{ $kelasItem->id }}" {{ $kelasItem->id == $user->kelas_id ? 'selected' : '' }}>
                        {{ $kelasItem->nama_kelas }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="foto">Foto:</label>
            <input type="file" name="foto" class="file-input">
            @if($user->foto)
                <img src="{{ asset($user->foto) }}" alt="User Photo" width="150" class="mt-2">
            @endif
        </div>
        <div class="button-container">
            <a href="{{ route('users.index') }}" class="btn-back">Kembali</a>
            <button type="submit">Submit</button>
        </div>
    </form>
</div>

@endsection
</html>
