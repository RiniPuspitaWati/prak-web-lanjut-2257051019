<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #a6c1ee, #fbc2eb);
            position: relative; 
        }

        .btn-back {
            position: absolute;
            top: 20px;
            left: 20px;
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: #fbc2eb; 
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-back:hover {
            background-color: #f9a1d1; 
        }

        .profile-image img {
            width: 150px;
            height: 150px;
            border-radius: 15px; 
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
            transition: box-shadow 0.3s ease;
        }

        .profile-image img:hover {
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.3);
        }

        .profile-container {
            background-color: #5a9bd8; 
            padding: 20px;
            border-radius: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); 
            width: 500px;
            text-align: center;
        }

        .profile-info {
            margin-top: 20px;
        }

        .info-item {
            background-color: #d3eafd; 
            color: black;
            margin: 10px 0;
            padding: 10px;
            border-radius: 10px;
            font-weight: 600;
            text-align: center;
            font-size: 16px;
        }

        h1 {
            color: #ffffff; 
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <a href="{{ route('users.index') }}" class="btn-back">Kembali ke Daftar Pengguna</a>

    <div class="profile-container">
        <div class="profile-image">
            <img src="{{ asset($user->foto ?? 'assets/img/default-foto.jpg') }}" alt="Profile Image">
        </div>

        <div class="profile-info">
            <div class="info-item"> {{ $user->nama }}</div>
            <div class="info-item"> {{ $user->npm }}</div>
            <div class="info-item"> {{ $user->kelas->nama_kelas ?? 'Kelas tidak ditemukan' }}</div>
        </div>
    </div>
</body>
</html>
