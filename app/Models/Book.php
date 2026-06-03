<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author_id',
        'genre',
        'publication',
        'cover_image',

    ];
    public function author(){
        return   $this->belongTo(Author::class,'author_id');
    }
}

