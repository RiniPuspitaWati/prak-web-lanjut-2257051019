<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User_PWL</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #6DD5FA, #2980B9); /* New background gradient */
        }
        .container {
            background-color: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2); /* Deeper shadow for modern feel */
            width: 600px; /* Wider form */
            text-align: center;
        }
        h1 {
            color: #333;
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 25px;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        label {
            font-weight: 600;
            margin-bottom: 5px;
            color: #555;
            font-size: 16px;
            text-align: left;
            width: 100%;
        }
        input, select {
            width: 100%;
            padding: 14px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
        }
        input:focus, select:focus {
            border-color: #3498db;
            box-shadow: 0 0 8px rgba(52, 152, 219, 0.6);
            outline: none;
        }
        input:hover, select:hover {
            border-color: #999;
        }
        button {
            background-color: #3498db;
            color: white;
            padding: 14px 20px;
            font-size: 18px;
            font-weight: 600;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(0, 123, 255, 0.3); /* Button shadow for depth */
        }
        button:hover {
            background-color: #2980B9;
            transform: translateY(-2px); /* Button hover effect */
        }
        button:active {
            transform: scale(0.98); /* Press effect */
        }
        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                width: 90%;
                padding: 20px;
            }
            input, select, button {
                font-size: 14px;
                padding: 12px;
            }
        }
    </style>
</head>
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create User</h1>
    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required placeholder="Masukkan Nama">

        <label for="npm">NPM:</label>
        <input type="text" id="npm" name="npm" required placeholder="Masukkan NPM">

        <label for="kelas_id">Kelas:</label>
        <select id="kelas_id" name="kelas_id" required>
            <option value="" disabled selected>Pilih Kelas</option>
            @foreach($kelas as $kelasItem)
                <option value="{{ $kelasItem->id }}">{{ $kelasItem->nama_kelas }}</option>
            @endforeach
        </select>

        <label for="foto">Foto:</label>
        <input type="file" id="foto" name="foto"><br><br>

        <button type="submit">Submit</button>
    </form>
</div>
@endsection

</html>
