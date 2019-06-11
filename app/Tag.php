<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    const BOOKS_PER_PAGE = 3;

    public function findTags()
    {
        return $this->belongsToMany(Book::class, 'tags_books');
    }

    public function findBooksByTags($id)
    {
        return Tag::with('findTags')->where('id', '=', $id)->paginate(self::BOOKS_PER_PAGE);
    }
}