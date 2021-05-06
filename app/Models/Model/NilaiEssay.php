<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiEssay extends Model
{
    use HasFactory;
    protected $table = 'nilai_essay';
    protected $guarded = ['id'];
}
