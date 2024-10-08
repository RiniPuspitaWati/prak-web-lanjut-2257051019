<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: url('/assets/image/d (1).jpeg') no-repeat center center/cover;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
        }

        .login-container {
            background: rgba(0, 0, 0, 0.8); 
            padding: 40px;
            border-radius: 15px;
            width: 350px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
            text-align: center;
        }

        .login-container h1 {
            margin-bottom: 20px;
            color: #ff79c6;
        }


        .login-container input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            background: transparent;
            border: none;
            border-bottom: 2px solid #ff79c6;
            color: #fff;
            font-size: 16px;
            outline: none;
        }

 
        .login-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin: 20px 0;
            background: #ff79c6;
            border: none;
            border-radius: 20px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .login-container input[type="submit"]:hover {
            background: #ff92d0;
        }

       
        .login-container label {
            color: #ff79c6;
            display: block;
            margin: 10px 0 5px;
            text-align: left;
        }
    </style>
</head>
@extends('layouts.app')

@section('content')

    <!-- <div class="login-container">
        <h1>Create User</h1>
        <form action="{{ route('user.store') }}" method="post">
            @csrf
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" value="Rini Puspita Wati">
            <label for="npm">NPM:</label>
            <input type="text" id="npm" name="npm" value="2257051019">
            <label for="kelas">Kelas:</label>
            <input type="text" id="kelas" name="kelas" value="A">
            <input type="submit" value="Submit">
        </form>
    </div>   -->
    <div class="login-container">
        <form action="{{ route('user.store') }}" method="post">
            @csrf
            <h1>Create User</h1>
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" value="{{ old('nama') }}" class="@error('nama') input-invalid @enderror">
            @error('nama')
                <div class="pesan-error">{{ $message }}</div>
            @enderror

            <label for="npm">NPM:</label>
            <input type="text" id="npm" name="npm" value="{{ old('npm') }}" class="@error('npm') input-invalid @enderror">
            @error('npm')
                <div class="pesan-error">{{ $message }}</div>
            @enderror

            <label for="kelas">Kelas:</label>
            <select name="kelas_id" id="kelas_id" class="@error('kelas_id') input-invalid @enderror">
                <option value="">Pilih Kelas</option>
                @foreach ($kelas as $kelasItem)
                    <option value="{{ $kelasItem->id }}" {{ old('kelas_id') == $kelasItem->id ? 'selected' : '' }}>
                        {{ $kelasItem->nama_kelas }}
                    </option>
                @endforeach
            </select>
            @error('kelas_id')
                <div class="pesan-error">{{ $message }}</div>
            @enderror

            <input type="submit" value="Submit">
        </form>
    </div>
    <style>
         .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
        }

        .logo {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        input, select {
            margin-bottom: 10px;
            padding: 5px;
        }
        .input-invalid {
            border: 1px solid red;
        }
        .pesan-error {
            color: red;
            font-size: 0.8em;
            margin-top: -5px;
            margin-bottom: 10px;
        }
    </style>
@endsection
</html> 



 