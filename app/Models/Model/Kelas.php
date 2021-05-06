<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $tabel = 'kelas';
    protected $guarded = [];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }
    public function grup()
    {
        return $this->hasMany(Grup::class, 'kelas_id', 'kelas_id');
    }
}
