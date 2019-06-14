<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use App\Http\Requests\BookRequest;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.dashboard',
            ['books' => Book::with('findTags')->orderBy('created_at', 'desc')->paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.add_book');
    }

    /**
     * @param BookRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(BookRequest $request)
    {
        $book = Book::create($request->all());

        return redirect(route('books.show', ['book' => $book->id]))->with('success',
            'Book has been successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('admin.pages.show_book', ['books' => Book::with('findTags')->find($book)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $books = Book::find($book);

        if (!$books) {
            return abort(404);
        }

        return view('admin.pages.edit_book', compact('books'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, Book $book)
    {
        $books = Book::find($book->getAttribute('id'));

        if (!$books) {
            return back()->with('error', 'Something went wrong');
        }

        $books->fill($request->all());
        $books->save();

        return redirect(route('books.index'))->with('success', 'Changes have been successfully saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $books = Book::find($book->getAttribute('id'));

        $books->delete();

        return redirect(route('books.index'))->with('success', 'Book has been successfully deleted');
    }
}
