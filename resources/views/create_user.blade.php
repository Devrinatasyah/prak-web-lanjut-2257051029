<!-- create_user.blade.php -->
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
    min-height: 100vh;
    margin: 0;
    background: linear-gradient(to right, #ff9a9e, #fecfef);
}

.form-container, .profile-container {
    text-align: center;
    background-color: #fff5f8;
    padding: 40px;
    border-radius: 20px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    width: 450px;
    transition: transform 0.3s ease;
}

.form-container:hover, .profile-container:hover {
    transform: translateY(-10px);
}

h1, h2 {
    font-family: 'Segoe UI', sans-serif;
    color: #ff758c;
    margin-bottom: 30px;
    font-size: 24px;
}

input, select {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 2px solid #ff758c;
    border-radius: 10px;
    background-color: #fff;
    font-size: 16px;
    color: #333;
    outline: none;
}

input:focus, select:focus {
    border-color: #ff7eb3;
}

input[type="submit"], button {
    width: 100%;
    padding: 12px;
    border: none;
    border-radius: 10px;
    background-color: #ff758c;
    color: white;
    font-size: 16px;
    cursor: pointer;
    margin-top: 20px;
    font-weight: bold;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

input[type="submit"]:hover, button:hover {
    background-color: #ff7eb3;
    transform: translateY(-2px);
}

.logo {
    width: 100px;
    height: 100px;
    margin-bottom: 20px;
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

.pesan-error {
    color: #0059ff;
    text-align: left;
    font-size: 14px;
    margin-top: 5px;
}

.input-invalid {
    border-color: #ff4757;
}

label {
    display: block;
    text-align: left;
    margin-top: 10px;
    color: #ff758c;
    font-weight: bold;
}
    </style>
</head>
<body>
    <div class="form-container">
        <form action="{{ route('user.store') }}" method="post">
            @csrf
            <h1>Create User</h1>

            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" value="{{ old('nama') }}" class="@error('nama') input-invalid @enderror">
            @error('nama')
                <div class="pesan-error">{{ $message }}</div>
            @enderror

            <label for="npm">NPM:</label>
            <input type="text" id="npm" name="npm" value="{{ old('npm') }}" class="@error('npm') input-invalid @enderror">
            @error('npm')
                <div class="pesan-error">{{ $message }}</div>
            @enderror

            <label for="kelas">Kelas:</label>
            <select name="kelas_id" id="kelas_id" class="@error('kelas_id') input-invalid @enderror">
                <option value="">Pilih Kelas</option>
                @foreach ($kelas as $kelasItem)
                    <option value="{{ $kelasItem->id }}" {{ old('kelas_id') == $kelasItem->id ? 'selected' : '' }}>
                        {{ $kelasItem->nama_kelas }}
                    </option>
                @endforeach
            </select>
            @error('kelas_id')
                <div class="pesan-error">{{ $message }}</div>
            @enderror

            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>