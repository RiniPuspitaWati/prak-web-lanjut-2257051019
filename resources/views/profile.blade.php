<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Card</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        /* General styling */
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #ff9a9e 0%, #fad0c4 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Background wrapper */
        .background-wrapper {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Profile card styling */
        .profile-card {
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            width: 300px;
            text-align: center;
            padding: 20px;
            position: relative;
        }

        /* Avatar styling */
        .avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            overflow: hidden;
            margin: 0 auto 20px;
            border: 5px solid #ff79c6;
        }

        .avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Info styling */
        .info {
            margin-top: 20px;
        }

        .label {
            color: #333;
            font-size: 18px;
            margin: 10px 0;
            background: #ff79c6;
            padding: 10px;
            border-radius: 10px;
            color: white;
        }
        
        /* Decorative elements */
        .profile-card::before, .profile-card::after {
            content: '';
            position: absolute;
            width: 100px;
            height: 100px;
            background: rgba(255, 121, 198, 0.5);
            border-radius: 50%;
            z-index: -1;
        }

        .profile-card::before {
            top: -20px;
            right: -20px;
        }

        .profile-card::after {
            bottom: -20px;
            left: -20px;
        }
    </style>
</head>
<body>
    <div class="background-wrapper">
        <div class="profile-card">
            <div class="avatar">
                <img src="/assets/image/ping.jpeg" alt="Profile Picture">
            </div>
            <div class="info">
                <div class="label">Nama: {{ $nama }}</div>
                <div class="label">Npm: {{ $npm }}</div>
                <div class="label">Kelas: {{ $nama_kelas ?? 'Kelas tidak ditemukan'}}</div>

            </div>
        </div>
    </div>
</body>
</html>
