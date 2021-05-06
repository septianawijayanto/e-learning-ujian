<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiPilgan extends Model
{
    use HasFactory;
    protected $table = 'nilai_pilgan';
    protected $guarded = ['id'];
}
