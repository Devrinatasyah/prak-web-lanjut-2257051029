<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\UserModel;

class UserController extends Controller
{
    // Define public properties for UserModel and Kelas
    public $userModel;
    public $kelasModel;

    // Constructor to initialize the models manually
    public function __construct()
    {
        $this->userModel = new UserModel(); // Initialize UserModel
        $this->kelasModel = new Kelas();    // Initialize Kelas model
    }

    public function profile($nama = "Devrinatasyah", $kelas = "B", $npm = "2257051029")
    {
        $data = [
            'nama' => $nama,
            'kelas' => $kelas,
            'npm' => $npm,
        ];

        return view('profile', $data);
    }

    public function create()
    {
        // Use the kelasModel property to get class data
        $kelas = $this->kelasModel->getKelas();

        // Prepare the data for the view
        $data = [
            'title' => 'Create User', // Adding the title key
            'kelas' => $kelas,
        ];

        // Return the create_user view with the class data and title
        return view('create_user', data: $data);
    }

    public function store(Request $request)
{
    // Validasi input dari request
    $validatedData = $request->validate([
        'nama' => 'required|string|max:255',
        'npm' => 'required|string|max:255',
        'kelas_id' => 'required|exists:kelas,id',
    ]);

    // Gunakan userModel untuk menyimpan data pengguna
    $this->userModel->create([
        'nama' => $request->input('nama'),
        'npm' => $request->input('npm'),
        'kelas_id' => $request->input('kelas_id'),
    ]);

    // Redirect ke halaman /user setelah menyimpan data
    return redirect()->to('/user');
}
    // Updated index method
    public function index()
    {
        // Fetch user data using the getUser() method from UserModel
        $data = [
            'title' => 'User List', // Title for the page
            'users' => $this->userModel->getUser(), // Get all users with related class data
        ];

        // Return the list_user view with the fetched data
        return view('list_user', $data);
    }
}
