<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(to right, #ff9a9e, #fecfef); /* Softer pink gradient */
        }

        .form-container {
            background-color: #fff5f8; /* Soft pinkish background */
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Lighter shadow */
            max-width: 450px;
            width: 100%;
            text-align: center;
            transition: transform 0.3s ease; 
        }

        .form-container:hover {
            transform: translateY(-10px); 
        }

        h2 {
            color: #ff758c;
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 30px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label, input {
            margin-bottom: 15px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 2px solid #ff758c; /* Accent color */
            border-radius: 10px;
            background-color: #fff;
            font-size: 16px;
            color: #333; /* Text color for inputs */
            outline: none;
        }

        input[type="text"]:focus {
            border-color: #ff7eb3; /* Slightly darker border when focused */
        }

        button[type="submit"] {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 10px;
            background-color: #ff758c;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 20px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #ff7eb3;
            transform: translateY(-2px); /* Slight lift on hover */
        }

        /* Responsive Design */
        @media (max-width: 500px) {
            .form-container {
                padding: 20px;
                width: 90%;
            }

            input[type="text"], button[type="submit"] {
                font-size: 14px;
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Create User</h2>
        <form action="{{ route('user.store') }}" method="POST">
            @csrf
            <input type="text" name="nama" placeholder="Masukkan Nama" required>
            <input type="text" name="npm" placeholder="Masukkan NPM" required>
            <input type="text" name="kelas" placeholder="Masukkan Kelas" required>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
