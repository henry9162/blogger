<?php

namespace Blogger\Http\Controllers;

use Illuminate\Http\Request;

use Blogger\Http\Requests;

use Blogger\Tag;

use Blogger\Category;

use Session;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::orderBy('id', 'desc')->paginate(5);
        $categories = Category::all();

        return view('tags.index')->withTags($tags)->withCategories($categories);
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255'
        ]);

        $tag = new Tag;

        $tag->name = $request->name;

        $tag->save();

        Session::flash('success', 'New tag was saved Succesfully!');

        return redirect()->route('tags.index', $tag->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag = Tag::find($id);
        $tags = Tag::all();
        $categories = Category::all();

        return view('tags.show')->withTag($tag)->withCategories($categories)->withTags($tags);
    }
    

    public function getTag($id)
    {
        $tag =Tag::find($id);
        $categories = Category::all();
        $tags = Tag::all();


        return view('tag.page')->withTag($tag)->withCategories($categories)->withTags($tags);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::find($id);

        return view('tags.edit')->withTag($tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tag = Tag::find($id);

        $this->validate($request, [
            'name' => 'required|max:255'
        ]);

        $tag = Tag::find($id);

        $tag->name = $request->name;

        $tag->save();

        Session::flash('success', 'Updated tag successfully');

        return redirect()->route('tags.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);

        $tag->posts()->detach();

        $tag->delete();

        Session::flash('success', 'The tag was successfully Deleted!');

        return redirect()->route('tags.index');
    }
}
