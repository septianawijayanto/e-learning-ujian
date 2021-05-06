<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class SoalPilgan extends Model
{
    use HasFactory;
    protected $table = 'soal_pilgan';
    protected $guarded = ['id'];
    public function ujian()
    {
        return $this->belongsTo(Ujian::class);
    }
    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }
    public function checkJawab()
    {
        return $this->belongsTo(NilaiPilgan::class, 'id', 'no_soal_id')->where('siswa_id', Session::get('id'));
    }
}
