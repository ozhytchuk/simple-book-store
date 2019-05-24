<?php

namespace App\Http\Controllers;

use App\Book;

class BooksByIdController extends Controller
{
    public function show($id)
    {
        $book = new Book();

        return view(
            'books_by_id',
            [
                'book' => $book->booksById($id),
                'tags' => Book::find($id)->findTags->toArray(),
            ]
        );
    }
}
