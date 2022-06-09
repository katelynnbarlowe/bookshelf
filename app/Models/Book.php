<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author_firstname',
        'author_lastname',
        'isbn',
        'isbn13',
        'rating',
        'average_rating',
        'publisher',
        'num_pages',
        'year_published',
        'year_published_original',
        'date_read',
        'date_added',
        'main_shelf',
        'review',
        'notes',
        'read_count',
        'recommended_by'
    ];

    public function shelves() {
        return $this->belongsToMany(Shelf::class);
    }
}
