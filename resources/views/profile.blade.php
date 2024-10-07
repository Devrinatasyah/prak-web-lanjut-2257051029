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
            position: relative; /* Add this */
        }

        .profile-container:hover {
            transform: translateY(-10px);
        }


        .logo {
            width: 80px;
            height: 80px;
            position: absolute;
            top: -20px;
            left: -10px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 24px;
            box-shadow: 2px 5px 25px 10px rgba(240, 252, 14, 0.1);
            background-color: #f2fc94;
        }

        .avatar {
            width: 180px;
            height: 180px;
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
        
        <img src="/assets/img/fotodev.jpg" alt="User Avatar" class="avatar">
        <div class="user-details">
            <h2 class="detail">{{ $nama }}</h2>
            <h2 class="detail">{{ $npm }}</h2>
            <h2 class="detail">{{ $nama_kelas ?? 'Kelas tidak ditemukan' }}</h2>
        </div>
    </div>
</body>
</html>