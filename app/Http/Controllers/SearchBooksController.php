<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Book;
use Illuminate\Http\Request;

class SearchBooksController extends Controller
{
    public function show(Request $request)
    {
        $books = new Book();
        $tags = new Tag();
        $q = $request->input('q');

        return view(
            'search_by_word',
            [
                'books' => $books->searchWord($q),
                'allTags' => $tags->allTags(),
                'q' => $q
            ]
        );
    }
}
