<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = ['foto', 'nama', 'tanggal_upload', 'deskripsi', 'judul', 'link_download', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
