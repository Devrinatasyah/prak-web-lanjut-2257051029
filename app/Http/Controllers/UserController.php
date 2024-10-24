<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\UserModel;
use App\Models\Fakultas;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    protected $userModel;
    protected $kelasModel;

    public function __construct()
    {
        $this->userModel = new UserModel(); 
        $this->kelasModel = new Kelas();    
    }

    // Method untuk menampilkan profil pengguna
public function profile($id)
{
    // Eager load 'kelas' and 'fakultas' relationships
    $data = $this->userModel->with(['kelas', 'fakultas'])->find($id);

    if (!$data) {
        return redirect()->route('user.list')->with('error', 'Pengguna tidak ditemukan');
    }

    return view('profile', [
        'title' => 'Profil Pengguna',
        'user' => $data,
    ]);
}


    // Method untuk menampilkan form pembuatan pengguna
    public function create()
    {
        $kelas = $this->kelasModel->getKelas();
        $fakultas = Fakultas::all();

        return view('create_user', [
            'title' => 'Buat Pengguna',
            'kelas' => $kelas,
            'fakultas' => $fakultas,
        ]);
    }

    // Method untuk menyimpan pengguna baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'kelas_id' => 'required|integer',
            'jurusan' => 'required|string|max:255',
            'semester' => 'required|string|max:255',
            'fakultas_id' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Upload foto jika ada
        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('photos', 'public');
        }
        
        // Simpan data pengguna
        $this->userModel->create([
            'nama' => $request->input('nama'),
            'kelas_id' => $request->input('kelas_id'),
            'jurusan' => $request->input('jurusan'),
            'semester' => $request->input('semester'),
            'fakultas_id' => $request->input('fakultas_id'),
            'foto' => $fotoPath,
        ]);

        return redirect()->route('user.list')->with('success', 'Pengguna berhasil diperbarui!');
    }    

    // Method untuk menampilkan detail pengguna
    public function show($id)
    {
        $user = $this->userModel->getUser($id);

        if (!$user) {
            return redirect()->route('user.list')->with('error', 'Pengguna tidak ditemukan');
        }

        return view('profile', [
            'title' => 'Profil',
            'user' => $user,
        ]);
    }

    // Method untuk menampilkan daftar pengguna
    public function index()
    {
        $data = [
            'title' => 'Daftar Pengguna',
            'users' => $this->userModel->with(['kelas', 'fakultas'])->get(),
        ];

        return view('list_user', $data);
    }

    // Method untuk menampilkan form edit
    public function edit($id)
    {
        $user = $this->userModel->find($id);

        if (!$user) {
            return redirect()->route('user.list')->with('error', 'Pengguna tidak ditemukan');
        }

        $kelas = $this->kelasModel->getKelas();
        $fakultas = Fakultas::all();

        return view('edit', [
            'title' => 'Edit Pengguna',
            'user' => $user,
            'kelas' => $kelas,
            'fakultas' => $fakultas,
        ]);
    }

    // Method untuk memperbarui data pengguna
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'kelas_id' => 'required|integer',
            'jurusan' => 'required|string|max:255',
            'semester' => 'required|string|max:255',
            'fakultas_id' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user = $this->userModel->find($id);

        if (!$user) {
            return redirect()->route('user.list')->with('error', 'Pengguna tidak ditemukan');
        }

        // Update data pengguna
        $user->nama = $request->input('nama');
        $user->kelas_id = $request->input('kelas_id');
        $user->jurusan = $request->input('jurusan');
        $user->semester = $request->input('semester');
        $user->fakultas_id = $request->input('fakultas_id');

        // Update foto jika diupload
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($user->foto) {
                Storage::disk('public')->delete('photos/' . $user->foto);
            }

            $user->foto = $request->file('foto')->store('photos', 'public');
        }

        $user->save();

        return redirect()->route('user.list')->with('success', 'Pengguna berhasil diperbarui!');
    }

    // Method untuk menghapus pengguna
    public function destroy($id)
    {
        $user = $this->userModel->find($id);

        if (!$user) {
            return redirect()->route('user.list')->with('error', 'Pengguna tidak ditemukan');
        }

        // Hapus foto pengguna jika ada
        if ($user->foto) {
            Storage::disk('public')->delete('photos/' . $user->foto);
        }

        $user->delete();

        return redirect()->route('user.list')->with('success', 'Pengguna berhasil dihapus!');
    }
}
