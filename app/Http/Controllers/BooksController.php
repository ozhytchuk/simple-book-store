<?php

namespace App\Http\Controllers;

use App\Book;
use App\Tag;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index(Request $request)
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

    public function sort(Request $request, $param)
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

    public function search(Request $request)
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
