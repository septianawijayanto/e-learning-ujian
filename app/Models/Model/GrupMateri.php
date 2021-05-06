<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupMateri extends Model
{
    use HasFactory;
    protected $table = 'grup_materi';
    protected $guarded = [];
    public function grup()
    {
        return $this->belongsTo(Grup::class);
    }
    public function materi()
    {
        return $this->belongsTo(Materi::class);
    }
    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }
}
