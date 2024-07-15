<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $fillable = [
        'ab_judul',
        'ab_foto',
        'ab_tag',
        'ab_desc',
    ];
}
