<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function allTags()
    {
        return Tag::all();
    }

    public function findTags()
    {
        return $this->belongsToMany(Book::class, 'tags_books');
    }

    public function findBooksByTags($id)
    {
        return Tag::with('findTags')->where('id', '=', $id)->get()->toArray();
    }
}