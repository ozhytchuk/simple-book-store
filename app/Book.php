<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static find(Book $id)
 */
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