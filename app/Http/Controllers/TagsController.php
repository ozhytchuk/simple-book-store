<?php

namespace App\Http\Controllers;

use App\Tag;

class TagsController extends Controller
{
    public function show($id)
    {
        $tags = new Tag();

        return view('pages.search_tag', ['books' => $tags->findBooksByTags($id)]);
    }
}
