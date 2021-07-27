<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $table = 'guru';
    protected $guarded = [];
    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'mapel_id');
    }
}
