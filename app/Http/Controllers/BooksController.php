<?php

namespace App\Http\Controllers;

use App\Book;
use App\Tag;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    const BOOKS_PER_PAGE = 3;

    public function index()
    {
        return view(
            'all',
            [
                'books' => Book::with('findTags')->paginate(self::BOOKS_PER_PAGE),
                'allTags' => Tag::all(),
            ]
        );
    }

    public function show($id)
    {
        return view(
            'books_by_id',
            [
                'book' => Book::find($id),
                'tags' => Book::find($id)->findTags->toArray(),
            ]
        );
    }

    public function sort($param)
    {
        $books = new Book();
        $tags = new Tag();

        return view(
            'all',
            [
                'books' => $books->sortBooks($param),
                'allTags' => $tags->allTags(),
            ]
        );
    }

    public function search(Request $request)
    {
        $books = new Book();
        $tags = new Tag();
        $q = $request->input('q');

        return view(
            'all',
            [
                'books' => $books->searchWord($q),
                'allTags' => $tags->allTags(),
                'q' => $q
            ]
        );
    }
}
