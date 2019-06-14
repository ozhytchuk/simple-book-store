<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    const BOOKS_PER_PAGE = 3;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     *
     */
    public function findTags()
    {
        return $this->belongsToMany(Book::class, 'tags_books');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function findBooksByTags(Tag $tag)
    {
        return Tag::with('findTags')->where('id', '=', $tag)->paginate(self::BOOKS_PER_PAGE);
    }
}