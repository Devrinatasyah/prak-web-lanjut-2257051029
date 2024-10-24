<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    // Guarding 'id' from mass assignment
    protected $guarded = ['id'];

    // Specify the table name
    protected $table = 'kelas'; // Use single quotes for the table name

    // Define the relationship between Kelas and UserModel
    public function users()
    {
        return $this->hasMany(UserModel::class, 'kelas_id');
    }

    // Method to get all kelas data from the database
    public function getKelas()
    {
        return $this->all(); // This retrieves all rows from the 'kelas' table
    }
}
