<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;

    protected $table = 'user'; // Define the table associated with the model
    protected $guarded = ['id']; // Protect the 'id' field from mass assignment

    // Define the relationship between UserModel and Kelas model
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    // Method to get all users with a join to the 'kelas' table
    public function getUser()
    {
        // Perform a join with the 'kelas' table to retrieve the class name
        return $this->join('kelas', 'kelas.id', '=', 'user.kelas_id')
                    ->select('user.*', 'kelas.nama_kelas as nama_kelas')
                    ->get();
    }
}
