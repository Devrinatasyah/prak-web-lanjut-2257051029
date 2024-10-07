<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Halaman Profil</title>

    <title>Profile</title>

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

            background: linear-gradient(to right, #ff9a9e, #fecfef); /* Smooth pink gradient */
        }

        .profile-container {
            text-align: center;
            background-color: #fff; /* Soft white background */
            padding: 50px;
            border-radius: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            width: 300px; /* Adjusted width */
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


            border: 4px solid #ff758c; /* Red-pinkish border */
            object-fit: cover;
        }

        .Info-Profil {
            margin-top: 20px;
        }

        .info-item {
            border: 2px solid #ff758c; /* Border color matching profile pic */
            padding: 10px;
            border-radius: 8px;
            margin: 10px 0;
            font-weight: 600;
            color: #333;
            font-size: 16px;
            background-color: #fff; /* White background */
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

            <img src="{{ asset('asset/img/fotodev.jpg') }}" alt="Foto Profil">
        </div>
        <div class="Info-Profil">
            <div class="info-item">Nama: <?= $nama ?></div>
            <div class="info-item">Kelas: <?= $kelas ?></div>
            <div class="info-item">NPM: <?= $npm ?></div>
        </div>
    </div>
</body>
</html>
