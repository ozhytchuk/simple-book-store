<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    const BOOKS_PER_PAGE = 5;

    /*public function allBooks()
    {
        return Book::with('findTags')->paginate(self::BOOKS_PER_PAGE);
    }*/

    public function sortBooks($param)
    {
        return Book::with('findTags')->orderBy($param)->paginate(self::BOOKS_PER_PAGE);
    }

    public function searchWord($q)
    {
        return Book::query()->with('findTags')->where('title', 'LIKE', "%$q%")->paginate(self::BOOKS_PER_PAGE);
    }

    public function findTags()
    {
        return $this->belongsToMany(Tag::class, 'tags_books');
    }
}