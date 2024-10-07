<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ProfileController extends Controller
{
    public function profile($nama = "Devrinatasyah", $kelas = "B", $npm = "2257051029")
    {

class ProfileController extends Controller{
    public function profile(){

        $data = [
            'nama' => 'Devrinatasyah',
            'kelas' => 'B',
            'npm' => '2257051029'

           ];
           
    return view('profile', $data);

        ];
        return view('profile', $data);

    }
}