<?php

namespace Blogger\Http\Controllers;

use Blogger\Post;

use Session;

use Illuminate\Http\Request;

use Blogger\Http\Requests;

use Blogger\Category;

use Blogger\Tag;

use Image;

use Storage;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.index')->withPosts($posts)->withCategories($categories)->withTags($tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
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
            'title' => 'required|max:255',
            'body' => 'required',
            'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'category_id' => 'required|integer',
            'post_image' => 'sometimes|image'
        ]);

        $post = new Post;

        $post->title = $request->title;
        $post->body = $request->body;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;

        if($request->hasFile('post_image'))
        {
            $image = $request->file('post_image');
            $filename = time(). '.' .$image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800, 600)->save($location);

            $post->image = $filename;
        }

        $post->save();

        $post->tags()->sync($request->tags, false);

        Session::flash('success', 'Your post was saved successfully');

        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        return view('posts.show')->withPost($post)->withCategories($categories);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        $cats = [];

        foreach($categories as $category){
            $cats[$category->id] = $category->name;
        }

        $tags = Tag::all();
        $tags2 = [];

        foreach($tags as $tag){
            $tags2[$tag->id] = $tag->name;
        }


        return view('posts.edit')->withPost($post)->withCategoriesss($cats)->withTagsss($tags2)
        ->withCategories($categories)->withTags($tags);
    }


    public function postLikes(Request $request)
    {
        $id = $request['postId'];
        $post = Post::find($id);

        $like = $post->likes()->create([]);

        $post->likes()->save($like);

        return view('postLikeCount')->withPost($post);

        /*$html = View::make('postLikeCount')->withPost($post);

        return response()->json(['html' => $html], 200);*/
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
        $post = Post::find($id);

        $this->validate($request, [
            'title' => 'required|max:255',
            'body' => 'required',
            'slug' => "required|alpha_dash|min:5|max:255|unique:posts,slug,$id",
            'category_id' => 'required|integer',
            'post_image' => 'image'
        ]);

        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->slug = $request->input('slug');
        $post->category_id = $request->input('category_id');

        if($request->hasFile('post_image'))
        {
            $image = $request->file('post_image');
            $filename = time(). '.' .$image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800, 600)->save($location);

            $oldImageFile = $post->image;

            $post->image = $filename;

            Storage::delete($oldImageFile);
        }

        $post->save();

        if (isset($request->tags)){
            $post->tags()->sync($request->tags);
        } else {
            $post->tags()->sync(array());
        }

        Session::flash('success', 'The post was successfully updated!');

        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->tags()->detach();

        Storage::delete($post->image);

        $post->delete();

        Session::flash('success', 'The post was successfully Deleted!');

        return redirect()->route('posts.index');
    }

}
