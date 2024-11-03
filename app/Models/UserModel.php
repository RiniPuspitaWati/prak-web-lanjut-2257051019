<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;

    protected $table = 'user';
    
    protected $fillable = [
        'nama',
        'npm',
        'kelas_id',
        'foto',
        'jurusan',
        'fakultas',
    ];

    public function kelas(){
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    public function jurusan(){
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }

    public function fakultas(){
        return $this->belongsTo(Fakultas::class, 'fakultas_id');
    }

    public function getUser($id = null) {
        if ($id != null) {
            return $this->join('kelas', 'kelas.id', '=', 'user.kelas_id')
                        ->select('user.*', 'kelas.nama_kelas', 'jurusan.nama_jurusan', 'fakultas.nama_fakultas')
                        ->where('user.id', $id) 
                        ->first(); 
        } else {
            return $this->join('kelas', 'kelas.id', '=', 'user.kelas_id')
                        ->select('user.id', 'user.nama', 'user.npm', 'user.foto', 'kelas.nama_kelas', 'jurusan.nama_jurusan', 'fakultas.nama_fakultas')
                        ->get();
        }
    }
}