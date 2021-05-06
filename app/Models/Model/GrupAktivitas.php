<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupAktivitas extends Model
{
    use HasFactory;
    protected $table = 'grup_aktivitas';
    protected $guarded = [];
    public function grup()
    {
        return $this->belongsTo(Grup::class);
    }
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
