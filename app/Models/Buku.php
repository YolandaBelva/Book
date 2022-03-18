<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function coverImage()
    {
        $imagepath = ($this->cover) ? $this->cover : '/covers/43sYiFwjF3GQKGJ9E7i8TgMRkepiHg2csC9b74J8.gif';

        return '/storage/' . $imagepath;
    }
    
}
