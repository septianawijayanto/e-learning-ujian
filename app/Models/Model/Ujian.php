<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ujian extends Model
{
    use HasFactory;
    protected $table = 'ujian';
    protected $guarded = ['id'];
    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }
    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }
}
