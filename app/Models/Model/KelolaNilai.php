<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelolaNilai extends Model
{
    use HasFactory;
    protected $table = 'kelola_nilai';
    protected $guarded = ['id'];
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }
}
