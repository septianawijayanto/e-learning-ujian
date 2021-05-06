<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grup extends Model
{
    use HasFactory;
    protected $table = 'grup';
    protected $guarded = [];
    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }
    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    public function grupmateri()
    {
        return $this->hasMany(GrupMateri::class);
    }
    public function grupsiswa()
    {
        return $this->hasMany(GrupSiswa::class);
    }
    public function grupaktivitas()
    {
        return $this->hasMany(GrupAktivitas::class);
    }
    public function scopeLatest($query)
    {
        return $query->orderBy('created_at', 'DESC');
    }
}
