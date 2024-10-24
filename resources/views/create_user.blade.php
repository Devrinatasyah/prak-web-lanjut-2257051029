@extends('layouts.app')

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

        .form-container {
            text-align: center;
            background-color: #fff5f8;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            width: 450px;
            transition: transform 0.3s ease;
        }

        .form-container:hover {
            transform: translateY(-10px);
        }

        h1 {
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

        .text-danger {
            color: #ff4757;
            text-align: left;
            font-size: 14px;
            margin-top: 5px;
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
    <form action="/user/store" method="post" enctype="multipart/form-data"> <!-- Tambahkan enctype -->
    @csrf
    <h1>Create User</h1>

    <label for="nama">Nama:</label>
    <input type="text" id="nama" name="nama" value="{{ old('nama') }}" required>
    @foreach($errors->get('nama') as $msg)
        <p class="text-danger">{{ $msg }}</p>
    @endforeach

    <!-- Kelas -->
    <label for="kelas_id">Kelas:</label>
    <select name="kelas_id" id="kelas_id" required>
        @foreach ($kelas as $kelasItem)
            <option value="{{ $kelasItem->id }}">{{ $kelasItem->nama_kelas }}</option>
        @endforeach
    </select>
    @foreach($errors->get('kelas_id') as $msg)
        <p class="text-danger">{{ $msg }}</p>
    @endforeach

    <!-- Tambahkan kolom jurusan -->
    <label for="jurusan">Jurusan:</label>
    <select name="jurusan" id="jurusan" required>
        <option value="Fisika">Fisika</option>
        <option value="Kimia">Kimia</option>
        <option value="Biologi">Biologi</option>
        <option value="Matematika">Matematika</option>
        <option value="Ilmu Komputer">Ilmu Komputer</option>
    </select>
    @foreach($errors->get('jurusan') as $msg)
        <p class="text-danger">{{ $msg }}</p>
    @endforeach

    <!-- Tambahkan kolom semester -->
    <label for="semester">Semester:</label>
    <input type="number" id="semester" name="semester" value="{{ old('semester') }}" min="1" max="14" required>
    @foreach($errors->get('semester') as $msg)
        <p class="text-danger">{{ $msg }}</p>
    @endforeach

    <!-- Tambahkan kolom fakultas -->
    <label for="fakultas_id">Fakultas:</label>
    <select name="fakultas_id" id="fakultas_id" required>
        @foreach ($fakultas as $fakultasItem)
            <option value="{{ $fakultasItem->id }}">{{ $fakultasItem->nama_fakultas }}</option>
        @endforeach
    </select>
    @foreach($errors->get('fakultas_id') as $msg)
        <p class="text-danger">{{ $msg }}</p>
    @endforeach

    <!-- Tambahkan kolom foto -->
    <label for="foto">Foto:</label>
    <input type="file" id="foto" name="foto" accept="image/*"> <!-- Input file untuk foto -->
    @foreach($errors->get('foto') as $msg)
        <p class="text-danger">{{ $msg }}</p>
    @endforeach

    <input type="submit" value="Submit">
</form>
