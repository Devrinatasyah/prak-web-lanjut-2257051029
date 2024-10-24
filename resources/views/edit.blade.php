@extends('layouts.app')

@section('content')

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #ff9a9e, #fecfef);
        }

        .form-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 500px;
            text-align: left;
            transition: all 0.3s ease-in-out;
        }

        .form-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        h1 {
            text-align: center;
            color: #ff758c;
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        label {
            font-size: 14px;
            color: #333;
            font-weight: 600;
            margin-bottom: 8px;
            display: inline-block;
        }

        input, select {
            width: 100%;
            padding: 12px;
            margin: 10px 0 20px;
            border: 2px solid #ff758c;
            border-radius: 8px;
            background-color: #fff;
            font-size: 16px;
            color: #555;
            box-sizing: border-box;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        input:focus, select:focus {
            border-color: #ff7eb3;
            box-shadow: 0 0 10px rgba(255, 120, 140, 0.3);
        }

        input[type="submit"], button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            background-color: #ff758c;
            color: #ffffff;
            font-size: 16px;
            cursor: pointer;
            font-weight: bold;
            margin-top: 20px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        input[type="submit"]:hover, button:hover {
            background-color: #ff7eb3;
            transform: translateY(-3px);
        }

        .btn-primary {
            display: block;
            text-align: center;
            padding: 12px;
            background-color: #ff758c;
            color: white;
            border-radius: 8px;
            margin-top: 20px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #ff7eb3;
        }

        .photo-preview img {
            max-width: 100px;
            border-radius: 8px;
            margin-top: 10px;
        }

        .photo-preview p {
            font-size: 14px;
            color: #555;
        }
    </style>

    <div class="form-container">
        <h1>Edit Pengguna</h1>
        <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label for="nama">Nama:</label>
            <input type="text" name="nama" value="{{ $user->nama }}" required>

            <label for="kelas_id">Kelas:</label>
            <select name="kelas_id" required>
                @foreach($kelas as $k)
                    <option value="{{ $k->id }}" {{ $user->kelas_id == $k->id ? 'selected' : '' }}>
                        {{ $k->nama_kelas }}
                    </option>
                @endforeach
            </select>

            <label for="jurusan">Jurusan:</label>
            <input type="text" name="jurusan" value="{{ $user->jurusan }}" required>

            <label for="semester">Semester:</label>
            <input type="text" name="semester" value="{{ $user->semester }}" required>

            <label for="fakultas_id">Fakultas:</label>
            <select name="fakultas_id" required>
                @foreach($fakultas as $f)
                    <option value="{{ $f->id }}" {{ $user->fakultas_id == $f->id ? 'selected' : '' }}>
                        {{ $f->nama_fakultas }}
                    </option>
                @endforeach
            </select>

            <label for="foto">Foto:</label>
            <input type="file" name="foto">
            @if($user->foto)
                <div class="photo-preview">
                    <p>Foto saat ini:</p>
                    <img src="{{ asset('storage/upload/' . $user->foto) }}" alt="Foto {{ $user->nama }}">
                </div>
            @endif

            <button type="submit">Edit</button>
        </form>
    </div>

@endsection
