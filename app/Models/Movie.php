<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
        protected $table ='movies';

    protected $fillable = [
        'title',
        'cover',
        'description',
        'author_id',
        'synopsis'
    ];
    /**
     * Get the author/creator linked to this movie.
     */
    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }
}
