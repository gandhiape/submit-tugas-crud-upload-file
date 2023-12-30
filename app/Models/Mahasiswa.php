<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    public $table = "mahasiswa"; 
    protected $primarykey ="nim";
    public $incrementing=false;
    protected $keyType="string";
    
    protected $fillable = ['nim', 'nama', 'gambar', 'email', 'alamat', 'umur', 'created_at'];
}
