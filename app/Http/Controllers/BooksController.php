<?php

namespace App\Http\Controllers;

use App\Book;
use App\Tag;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    const BOOKS_PER_PAGE = 3;

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view(
            'pages.home',
            [
                'books' => Book::with('findTags')->orderBy('created_at', 'desc')->paginate(self::BOOKS_PER_PAGE),
                'allTags' => Tag::all(),
            ]
        );
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Book $book)
    {
        return view(
            'pages.show',
            [
                'book' => Book::with('findTags')->find($book->getAttribute('id')),
            ]
        );
    }

    /**
     * @param $param
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function sort($param)
    {
        return view(
            'pages.sort',
            [
                'books' => Book::with('findTags')->orderBy($param)->paginate(self::BOOKS_PER_PAGE),
                'allTags' => Tag::all(),
                'parameter' => $param,
            ]
        );
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        $q = $request->input('q');

        return view(
            'pages.search',
            [
                'books' => Book::query()->with('findTags')->where('title', 'LIKE',
                    "%$q%")->paginate(self::BOOKS_PER_PAGE),
                'allTags' => Tag::all(),
                'q' => $q
            ]
        );
    }
}
