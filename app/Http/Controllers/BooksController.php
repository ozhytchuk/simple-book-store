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
            'pages.home',
            [
                'books' => Book::with('findTags')->paginate(self::BOOKS_PER_PAGE),
                'allTags' => Tag::all(),
            ]
        );
    }

    public function show($id)
    {
        return view(
            'pages.show',
            [
                'book' => Book::with('findTags')->find($id),
            ]
        );
    }

    public function sort($param)
    {
        $books = new Book();

        return view(
            'pages.sort',
            [
                'books' => $books->sortBooks($param),
                'allTags' => Tag::all(),
                'parameter' => $param,
            ]
        );
    }

    public function search(Request $request)
    {
        $books = new Book();
        $q = $request->input('q');

        return view(
            'pages.search',
            [
                'books' => $books->searchWord($q),
                'allTags' => Tag::all(),
                'q' => $q
            ]
        );
    }
}
