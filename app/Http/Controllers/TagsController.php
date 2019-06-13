<?php

namespace App\Http\Controllers;

use App\Tag;

class TagsController extends Controller
{
    const BOOKS_PER_PAGE = 3;

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        return view(
            'pages.search_tag',
            [
                'books' => Tag::with('findTags')
                    ->where('id', '=', $id)
                    ->paginate(self::BOOKS_PER_PAGE)
            ]
        );
    }
}
