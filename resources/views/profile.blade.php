<!-- profile.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background: linear-gradient(to right, #ff9a9e, #fecfef);
        }

        .profile-container {
            text-align: center;
            background-color: #fff5f8;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            width: 450px;
            transition: transform 0.3s ease;
            position: relative;
        }

        .profile-container:hover {
            transform: translateY(-10px);
        }

        .avatar {
            width: 120px; /* Ukuran baru untuk lebar */
            height: 120px; /* Ukuran baru untuk tinggi */
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid #ff758c;
            margin-bottom: 25px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .avatar:hover {
            transform: scale(1.05);
            box-shadow: 0 0 25px rgba(255, 119, 119, 0.5);
        }

        .detail {
            padding: 12px;
            margin-bottom: 18px;
            border-radius: 12px;
            background-color: rgba(255, 117, 140, 0.15);
            color: #ff758c;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .detail:hover {
            background-color: rgba(255, 117, 140, 0.25);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="profile-container">
        @if($user->foto)
            <img src="{{ asset('storage/' . $user->foto) }}" alt="Foto {{ $user->nama }}" class="avatar"> <!-- Menambahkan class 'avatar' di sini -->
        @endif
        <div class="user-details">
            <h2 class="detail">{{ $user->nama }}</h2>
            <h2 class="detail">{{ $user->nama_kelas ?? 'Kelas tidak ditemukan' }}</h2>
            <h2 class="detail">{{ $user->jurusan ?? 'Jurusan tidak ditemukan' }}</h2>
            <h2 class="detail">semester {{ $user->semester ?? 'Semester tidak ditemukan' }}</h2>
            <h2 class="detail"> {{ $user->fakultas->nama_fakultas ?? 'Fakultas tidak ditemukan' }}</h2>
        </div>
    </div>
</body>
</html>
