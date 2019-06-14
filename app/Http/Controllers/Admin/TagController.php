<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TagRequest;
use App\Tag;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    const TAGS_PER_PAGE = 6;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.tags_index',
            ['tags' => Tag::query()->orderBy('created_at', 'desc')->paginate(self::TAGS_PER_PAGE)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.tags_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {
        Tag::create($request->all());

        return redirect(route('tags.index'))->with('success', 'Book has been successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        return view('admin.pages.tags_show',
            ['tags' => Tag::with('findTags')->find($tag->getAttribute('id'))]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        $tags = Tag::find($tag);
        if (!$tags) {
            return abort(404);
        }

        return view('admin.pages.tags_edit', compact('tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $request, Tag $tag)
    {
        $tags = Tag::find($tag->getAttribute('id'));

        if (!$tags) {
            return back()->with('error', 'Something went wrong');
        }

        $tags->fill($request->all());
        $tags->save();

        return redirect(route('tags.index'))->with('success', 'Changes have been successfully saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tags = Tag::find($tag->getAttribute('id'));

        $tags->delete();

        return redirect(route('tags.index'))->with('success', 'Book has been successfully deleted');
    }
}
