<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Book;
use Illuminate\Http\Request;

class SortBooksController extends Controller
{
    public function show(Request $request, $param)
    {
        $books = new Book();
        $tags = new Tag();
        $currentPage = $request->get('page', 1);

        return view(
            'all',
            [
                'books' => $books->sortBooks($param, $currentPage),
                'allTags' => $tags->allTags(),
                'countBooks' => $books->countRows()
            ]
        );
    }
}
