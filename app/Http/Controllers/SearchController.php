<?php

namespace Blogger\Http\Controllers;

use DB;

use Illuminate\Http\Request;

use Blogger\Http\Requests;

use Blogger\Category;

use Blogger\Tag;

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

        $cats = Category::all();
        $tagss = Tag::all();

    	return view('search.results')->withCategories($categories)->withTags($tags)
        ->withCats($cats)->withTagss($tagss);
    }
}
