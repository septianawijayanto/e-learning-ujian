<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TugasJawaban extends Model
{
    use HasFactory;
    protected $table = 'tugas_jawaban';
    protected $guarded = [];
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
    public function tugas()
    {
        return $this->belongsTo(Tugas::class);
    }
}
