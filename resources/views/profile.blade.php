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
            background: linear-gradient(135deg, #a6c1ee, #fbc2eb); /* Two-color gradient (light blue and soft pink) */
            position: relative; /* Make sure the button can be positioned */
        }

        .btn-back {
            position: absolute;
            top: 20px;
            left: 20px;
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: #fbc2eb; /* Same pink as the gradient */
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-back:hover {
            background-color: #f9a1d1; /* Slightly darker pink for hover */
        }

        .profile-image img {
            border-radius: 50%;
            width: 150px;
            height: 150px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
            transition: box-shadow 0.3s ease;
        }

        .profile-image img:hover {
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.3);
        }
        
        .profile-container {
            background-color: #5a9bd8; /* Calm blue background for the container */
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
            background-color: #d3eafd; /* Light blue info box */
            color: black;
            margin: 10px 0;
            padding: 10px;
            border-radius: 10px;
            font-weight: 600;
            text-align: center;
            font-size: 16px;
        }

        h1 {
            color: #ffffff; /* White text for the heading */
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <!-- Button to go back to the list of users -->
    <a href="{{ route('users.index') }}" class="btn-back">Kembali ke Daftar Pengguna</a>

    <div class="profile-container">
        <div class="profile-image">
            <img src="{{ asset($user->foto ?? 'assets/img/default-foto.jpg') }}" alt="Profile Image">
        </div>

        <div class="profile-info">
            <div class="info-item">Nama: {{ $user->nama }}</div>
            <div class="info-item">NPM: {{ $user->npm }}</div>
            <div class="info-item">Kelas: {{ $user->kelas->nama_kelas ?? 'Kelas tidak ditemukan' }}</div>
        </div>
    </div>
</body>
</html>
