<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    const BOOKS_PER_PAGE = 5;


    protected $fillable = [
      'title', 'author', 'description', 'poster', 'url', 'price', 'book_date'
    ];

    protected $dates = [
        'book_date',
        'created_at',
        'updated_at',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function findTags()
    {
        return $this->belongsToMany(Tag::class, 'tags_books');
    }
}