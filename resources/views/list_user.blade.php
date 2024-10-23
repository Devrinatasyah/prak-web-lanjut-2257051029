@extends('layouts.app')

@section('content')

    <style>
        h1 {
            color: #ff758c;
            text-align: center;
            margin-bottom: 20px;
        }

        .btn-primary {
            background-color: #ff758c;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #ff7eb3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        table th {
            background-color: #ff758c;
            color: white;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        a, button {
            text-decoration: none;
            border: none;
            cursor: pointer;
        }

        /* Styling for Edit button */
        .btn-edit {
            background-color: #007bff;
            color: white;
            padding: 8px 16px;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn-edit:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        /* Styling for Delete button */
        .btn-delete {
            background-color: #DC143C;
            color: white;
            padding: 8px 16px;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn-delete:hover {
            background-color: #ff1c1c;
            transform: translateY(-2px);
        }
    </style>

    <h1>Ini halaman list user</h1>

    <!-- Tambahkan tombol untuk menuju ke halaman create user -->
    <a href="{{ route('user.create') }}" class="btn btn-primary">Tambah User</a>

    <table border="1" cellpadding="10" cellspacing="0" style="margin-top: 20px;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>NPM</th>
                <th>Kelas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->nama }}</td>
                    <td>{{ $user->npm }}</td>
                    <td>{{ $user->nama_kelas }}</td>
                    <td>
                        <!-- Warna tombol Edit biru dan Delete merah sebagai button -->
                        <button class="btn-edit">Edit</button>
                        <button class="btn-delete">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
