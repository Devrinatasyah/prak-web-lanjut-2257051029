<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User Form</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #74ebd5, #ACB6E5); 
        }

        .form-container {
            background-color: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); 
            max-width: 400px;
            width: 100%;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
            font-size: 24px;
            font-weight: 600;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label, input {
            margin-bottom: 15px;
        }

        input[type="text"] {
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
            transition: all 0.3s ease; 
        }

        input[type="text"]:focus {
            border-color: #28a745;
            box-shadow: 0 0 5px rgba(40, 167, 69, 0.5);
            outline: none;
        }

        input[type="text"]:hover {
            border-color: #999;
        }

        input[type="submit"], button[type="submit"] {
            padding: 12px;
            border: none;
            background-color: #28a745;
            color: white;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            border-radius: 6px;
            transition: all 0.3s ease; 
        }

        input[type="submit"]:hover, button[type="submit"]:hover {
            background-color: #218838;
            transform: scale(1.05); 
        }

        input[type="submit"]:active, button[type="submit"]:active {
            transform: scale(1); 
        }

        /* Responsive Design */
        @media (max-width: 500px) {
            .form-container {
                padding: 20px;
                width: 90%;
            }

            input[type="text"], input[type="submit"] {
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
            <input type="text" name="nama" placeholder="Nama" required>
            <input type="text" name="npm" placeholder="NPM" required>
            <input type="text" name="kelas" placeholder="Kelas" required>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>