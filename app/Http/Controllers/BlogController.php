<?php

namespace Blogger\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redis;

use LRedis;

use Blogger\Http\Requests;

use Blogger\Post;

use Blogger\Category;

use Blogger\Comment;

class BlogController extends Controller
{
    public function getSingle($slug)
    {
    	$posts = Post::orderBy('id', 'desc')->limit(4)->get();
        /*$posts = Cache::remember('recent_post_cache', 1, function()
        {
            return Post::orderBy('id', 'desc')->limit(4)->get();
        });*/

    	$post = Post::where('slug', '=', $slug)->first();
        /*$post = Cache::remember('single_post_cache', 1, function()
        {
            return Post::where('slug', '=', $slug)->first();
        });*/

        $id = $post->id;
        $cate = Category::all();

    	// This is for the related posts
    	$categories = Category::orderBy('id', 'desc')->limit(6)->get();
        /*$categories = Cache::remember('single_category_post_cache', 1, function()
        {
            return Category::orderBy('id', 'desc')->limit(6)->get();
        });*/


    	foreach($categories as $category){
    		if ($category->id == $post->category_id){ 
    			$postss = $category->posts()->get(); 
    		}
    	}

        $storage = LRedis::Connection();

        /*if ($storage->zScore('articleViews', 'article:' .$id) )
        {
            $storage->pipeline()->zIncrBy('articleViews', 1, 'article:' .$id)->incr('article:' .$id. ':views')->exec();*/
            /*{
                $pipe->zIncrBy('articleViews', 1, 'article:' .$id);
                $pipe->incr('article:' .$id. ':views');
            });
        } else {*/
            $views = $storage->incr('article:' . $id . ':views');
            $storage->zIncrBy('articleViews', $views, 'article:' .$id);
        /*}

        $views = $storage->get('article:' .$id. ':views');*/


    	return view('blog.single')->withPost($post)->withPosts($posts)->withPostss($postss)
        ->withCategories($cate)->withViews($views);
    }

}
