<?php

namespace Blogger\Http\Controllers;

use DB;

use Illuminate\Http\Request;

use Blogger\Http\Requests;

use Blogger\Category;

use Blogger\Tag;

use  Blogger\Post;

class SearchController extends Controller
{
    public function getResults(Request $request)
    {
    	$query = $request->input('query');

    	if (!$query){
    		return redirect()->back();
    	}

    	$categories = Category::where(DB::raw("name"), 'LIKE', "%{$query}%")->get();

    	$tags = Tag::where(DB::raw("name"), 'LIKE', "%{$query}%")->get();

        $title = Post::where(DB::raw("title"), 'LIKE', "%{$query}%")->get();

        $cats = Category::all();
        $tagss = Tag::all();
        $posts = Post::all();

    	return view('search.results')->withCategories($categories)->withTags($tags)
        ->withCats($cats)->withTagss($tagss)->withTitle($title)->withPosts($posts);
    }
}
