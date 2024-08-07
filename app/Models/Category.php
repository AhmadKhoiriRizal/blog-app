<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['id','kategori'];

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
