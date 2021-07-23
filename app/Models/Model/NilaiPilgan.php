<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiPilgan extends Model
{
    use HasFactory;
    protected $table = 'nilai_pilgan';
    protected $guarded = ['id'];
    public function ujian()
    {
        return $this->belongsTo(Ujian::class);
    }
    public function detailSoal()
    {
        return $this->belongsTo(SoalPilgan::class, 'no_soal_id');
    }
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
