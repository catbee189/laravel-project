<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

 protected $fillable = [
    'title',
    'author_id', // <-- Must match your key configuration name
    'genre',
    'publication',
    'cover_image',
];
  /**
 * Get the author that owns the book.
 */
public function author()
{
    return $this->belongsTo(Author::class, 'author_id');
}
}

