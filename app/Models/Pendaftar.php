<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    use HasFactory;

    protected $table = 'pendaftar';
    protected $primaryKey = 'id';
    public $incrementing = false; // karena kamu manual buat id
    protected $fillable = [
        'id',
        'nama_siswa','tempat_lahir','jenis_kelamin','anak_ke','alamat','nik','tanggal_lahir','agama','jumlah_saudara',
        'nama_ayah','nik_ayah','pekerjaan_ayah','penghasilan_ayah',
        'nama_ibu','nik_ibu','pekerjaan_ibu','penghasilan_ibu',
        'telepon','email','alamat_orangtua','jalur','kelas','status'
    ];
}