<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['foto', 'tanggal_upload', 'judul', 'deskripsi', 'nama_uploader', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
