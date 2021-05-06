<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoalEssay extends Model
{
    use HasFactory;
    protected $table = 'soal_essay';
    protected $guarded = ['id'];
    public function ujian()
    {
        return $this->belongsTo(Ujian::class);
    }
    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }
}
