<?php

namespace Blogger\Http\Controllers;

use Illuminate\Http\Request;

use Blogger\Http\Requests;

use Blogger\Category;

use Blogger\Tag;

use Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('categories.index')->withCategories($categories)->withTags($tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

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

        $category = new Category;

        $category->name = $request->name;

        $category->save();

        Session::flash('success', 'New category has been created!');

        return redirect()->route('categories.index', $category->id);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function show($id)
    {
        $category = Category::find($id);
        $categories = Category::all();
        return view('blog.single')->withCategory($category)->withCategories($categories);
    }*/

    public function getCategory($id)
    {
        $category = Category::find($id);

        $categories = Category::all();

        $tags = Tag::all();

        return view('category.page')->withCategory($category)->withCategories($categories)->withTags($tags);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        $categories = Category::all();
        $tags = Tag::all();

        return view('categories.edit')->withCategory($category)->withCategories($categories)->withTags($tags);
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
        $category = Category::find($id);

        $this->validate($request, [
            'name' => 'required|max:255'
        ]);

        $category = Category::find($id);

        $category->name = $request->name;

        $category->save();

        Session::flash('success', 'Category was Updated successfully!');

        return redirect()->route('categories.index', $category->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        $category->delete();

        Session::flash('success', 'Category was deleted successfully!');

        return redirect()->back();
    }
}
