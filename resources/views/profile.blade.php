<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
       body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }

        .profile-card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            width: 300px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-image: url('./img/Ubur-ubur biru.jpeg');
            background-size: cover;
            background-position: center;
        }

        .avatar {
            width: 100px;
            height: 100px;
            margin: 0 auto 20px;
            border-radius: 50%;
            overflow: hidden;
        }

        .avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .info {
            margin-top: 10px;
        }

        .label {
            background-color: #e0e0e0;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
        }

    </style>
</head>
<body>
    <div class="profile-card">
        <div class="avatar">
            <img src="/image/icon.jpeg" alt="Profile Picture">
        </div>
        <div class="info">
            <div class="label">Rini Puspita Wati</div>
            <div class="label">A</div>
            <div class="label">2257051019</div>
        </div>
    </div>
</body>
</html>
