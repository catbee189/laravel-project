<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    // This must match the database table name
    protected $table = 'authors';

    // This allows the Controller's Author::create() and $author->update() to accept data
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address'
    ];
}