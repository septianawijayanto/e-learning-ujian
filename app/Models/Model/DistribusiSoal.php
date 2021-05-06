<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistribusiSoal extends Model
{
    use HasFactory;
    protected $table = 'distribusi_soal';

    protected $guarded = ['id'];
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    public function ujian()
    {
        return $this->belongsTo(Ujian::class);
    }
}
