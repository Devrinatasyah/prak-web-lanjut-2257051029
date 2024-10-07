<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Profil</title>

    <!-- Import Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #74ebd5, #ACB6E5); 
        }
        .profile-container {
            text-align: center;
            background-color: #00272b;
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .Foto-Profil img {
            border-radius: 50%;
            width: 150px;
            height: 150px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
            transition: box-shadow 0.3s ease;
            border: 5px solid #e0ff4f; /* Tambahkan border untuk frame */
            object-fit: cover; /* Agar gambar memenuhi frame secara proporsional */
        }

        .Foto-Profil img:hover {
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.3);
        }

        .Info-Profil {
            width: 200px;
            margin: 0 auto;
        }

        .info-item {
            background-color: #e0ff4f;
            margin: 10px 0;
            padding: 10px;
            border-radius: 10px;
            font-weight: 600;
            text-align: center;
            color: #333;
            font-size: 16px;
        }

    </style>
</head>
<body>
    <div class="profile-container">
        <div class="Foto-Profil">
            <img src="{{ asset('assets/img/Bromo DHR 2.jpg') }}" alt="Foto Profil">
        </div>
        <div class="Info-Profil">
            <div class="info-item"><?= $nama ?></div>
            <div class="info-item"><?= $kelas ?></div>
            <div class="info-item"><?= $npm ?></div>
        </div>
    </div>
</body>
</html>