<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    public $booksPerPage = 5;

    public function allBooks($currentPage)
    {
        return Book::with('findTags')->get()->forPage($currentPage, $this->booksPerPage)->toArray();
    }

    public function booksById($id)
    {
        return Book::all()->find($id);
    }

    public function sortBooks($param, $currentPage)
    {
        return Book::with('findTags')->get()->sortBy($param)->forPage($currentPage, $this->booksPerPage)->toArray();
    }

    public function searchWord($q)
    {
        return Book::query()->with('findTags')->where('title', 'LIKE', "%$q%")->get()->toArray();
    }

    public function tags()
    {
        return $this->hasMany(Tag::class);
    }

    public function findTags()
    {
        return $this->belongsToMany(Tag::class, 'tags_books');
    }

    public function countRows()
    {
        return Book::all()->count();
    }
}