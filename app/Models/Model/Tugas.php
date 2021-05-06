<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;
    protected $table = 'tugas';
    protected $guarded = [];
    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }
    public function grup()
    {
        return $this->belongsTo(Grup::class);
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
