<?php

namespace App\Http\Controllers;

use App\Book;
use App\Tag;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function showAllBooks(Request $request)
    {
        $book = new Book();
        $tags = new Tag();
        $currentPage = $request->get('page', 1);

        return view(
            'all',
            [
                'books' => $book->allBooks($currentPage),
                'allTags' => $tags->allTags(),
                'countBooks' => $book->countRows()
            ]
        );
    }
}
