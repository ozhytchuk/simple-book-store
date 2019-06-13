<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.pages.dashboard', ['books' => Book::with('findTags')->paginate(5)]);
    }

    public function addBook()
    {
        return view('admin.pages.add_book');
    }

    public function addBookRequest(BookRequest $request)
    {
        Book::create([
            'title' => $request->input('title'),
            'author' => $request->input('author'),
            'description' => $request->input('description'),
            'poster' => $request->input('poster'),
            'url' => $request->input('url'),
            'price' => $request->input('price'),
        ]);

        return redirect(route('admin'))->with('success', 'Book has been successfully added');
    }

    public function show($id)
    {
        return view(
            'admin.pages.show_book',
            [
                'book' => Book::with('findTags')->find($id),
            ]
        );
    }

    public function editBook($id)
    {
        $book = Book::find($id);
        if (!$book) {
            return abort(404);
        }

        return view('admin.pages.edit_book', compact('book'));
    }

    public function editBookRequest(BookRequest $request, $id)
    {
        $book = Book::find($id);
        if (!$book) {
            return abort(404);
        }

        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->description = $request->input('description');
        $book->poster = $request->input('poster');
        $book->url = $request->input('url');
        $book->price = $request->input('price');
        $book->book_date = $request->input('date');

        if ($book->save()) {
            return redirect(route('admin'))->with('success', 'Changes have been successfully saved');
        }

        return back()->with('error', 'Something went wrong');
    }

    public function deleteBook($id)
    {
        Book::with('findTags')->find($id)->delete();

        return back()->with('success', 'Book has been successfully deleted');
    }
}