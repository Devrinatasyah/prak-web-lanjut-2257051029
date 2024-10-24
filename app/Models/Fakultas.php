<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    use HasFactory;

    protected $table = 'fakultas'; // Nama tabel di database
    protected $guarded = ['id'];

    public function users()
    {
        return $this->hasMany(UserModel::class, 'fakultas_id');
    }
}
