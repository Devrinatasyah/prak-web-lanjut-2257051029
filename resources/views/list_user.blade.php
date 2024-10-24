@extends('layouts.app')

@section('content')

    <style>
        /* General Body Styling */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background: linear-gradient(to right, #ff9a9e, #fecfef);
        }

        /* Styling for Heading */
        h1 {
            color: #ff758c;
            text-align: center;
            margin-bottom: 30px;
            font-size: 2.5em;
            letter-spacing: 2px;
            text-transform: uppercase;
            font-weight: bold;
        }

        /* Primary Button Styling */
        .btn-primary {
            background-color: #ff758c;
            color: white;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 30px;
            font-weight: bold;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease, transform 0.2s ease;
            cursor: pointer;
            margin-bottom: 20px;
        }

        .btn-primary:hover {
            background-color: #ff7eb3;
            transform: translateY(-3px);
        }

        /* Table Styling */
        table {
            width: 100%;
            max-width: 1200px;
            margin: 20px auto;
            border-collapse: collapse;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        table th, table td {
            padding: 15px 20px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        table th {
            background-color: #ff758c;
            color: white;
            text-transform: uppercase;
            font-size: 1em;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tr:hover {
            background-color: #f1f1f1;
            transform: scale(1.01);
            transition: transform 0.2s ease;
        }

        /* Button Styling for Actions */
        a, button {
            text-decoration: none;
            border: none;
            cursor: pointer;
        }

        .btn-view, .btn-edit, .btn-delete {
            padding: 8px 15px;
            border-radius: 20px;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.3s ease;
            box-shadow: 0 3px 5px rgba(0, 0, 0, 0.1);
        }

        .btn-view {
            background-color: #28a745;
            color: white;
        }

        .btn-view:hover {
            background-color: #218838;
            transform: translateY(-2px);
        }

        .btn-edit {
            background-color: #007bff;
            color: white;
        }

        .btn-edit:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        .btn-delete {
            background-color: #DC143C;
            color: white;
        }

        .btn-delete:hover {
            background-color: #ff1c1c;
            transform: translateY(-2px);
        }

        /* Image Styling */
        .user-photo {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid #ff758c;
        }

        /* Responsive Design */
        @media screen and (max-width: 768px) {
            body {
                padding: 10px;
            }

            table {
                width: 100%;
                font-size: 0.9em;
            }

            h1 {
                font-size: 2em;
            }

            .btn-primary {
                padding: 10px 20px;
            }
        }
    </style>

    <h1>Daftar Pengguna</h1>

    <a href="{{ route('user.create') }}" class="btn btn-primary">Tambah Pengguna</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Semester</th>
                <th>Fakultas</th>
                <th>Jurusan</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->nama }}</td>
                    <td>{{ $user->nama_kelas }}</td>
                    <td>{{ $user->semester }}</td>
                    <td>{{ $user->fakultas->nama_fakultas ?? 'Fakultas tidak ditemukan' }}</td>
                    <td>{{ $user->jurusan }}</td>
                    <td>
                    <img src="{{ asset('storage/'. $user->foto) }}" alt="Foto {{ $user->nama }}" class="user-photo">
                


                    </td>
                    <td>
                        <a href="{{ route('user.show', $user->id) }}" class="btn-view">View</a> <!-- Tombol View -->
                        <a href="{{ route('user.edit', $user->id) }}" class="btn-edit">Edit</a>
                        <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
