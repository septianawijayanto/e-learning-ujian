<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupSiswa extends Model
{
    use HasFactory;
    protected $table = 'grup_siswa';
    protected $guarded = [];
    public function siswa()
    {
        return  $this->belongsTo(Siswa::class);
    }
    public function grup()
    {
        return $this->belongsTo(Grup::class);
    }
    public function grupmateri()
    {
        return $this->hasMany(GrupMateri::class, 'grup_id', 'grup_id');
    }
}
