<?php

namespace Blogger\Http\Controllers;

use Cache;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redis;

use LRedis;

use Blogger\Http\Requests;

use Blogger\Post;

use Blogger\Tag;

use Blogger\Category;

use Mail;

use Session;

use DB;

class PagesController extends Controller
{

    public function getIndex(Request $request)
    {
        DB::Connection()->enableQueryLog();

        $storage = LRedis::Connection();

        $porpular = $storage->zRevRange('articleViews', 0, 3);

        $page = $request->has('page') ? $request->query('page') : 1;

        $posts = Cache::remember('blog_post_cache' . $page, 15, function()
        {
            return Post::orderBy('id', 'desc')->paginate(10);
        });

        $allPosts = Post::all();

        $log = DB::getQueryLog();

        print_r($log);

        $categories = Category::all();
        $tags = Tag::all();

    	return view('pages.welcome')->withPosts($posts)->withTags($tags)->withCategories($categories)
        ->withPorpular($porpular)->withPostssss($allPosts);
    }

    public function getAbout()
    {
        $posts = Post::orderBy('id', 'desc')->limit(8)->get();   
        $categories = Category::all();
    	return view('pages.about')->withPosts($posts)->withCategories($categories);
    }

    public function getBlog()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(10);

        /*DB::Connection()->enableQueryLog();

        $log = DB::getQueryLog();

        print_r($log);*/


        $categories = Category::all();
        $tags = Tag::all();

    	return view('pages.blog')->withposts($posts)
        ->withCategories($categories)->withTags($tags);
    }

    /*public function getWebDevelopment()
    {
        $categories = Category::all();
        $tags = Tag::all();
    	return view('pages.development')->withTags($tags)->withCategories($categories);
    }*/

    public function getContact()
    {
        $posts = Post::orderBy('id', 'desc')->limit(8)->get();
        $categories = Category::all();
        $tags = Tag::all();
    	return view('pages.contact')->withPosts($posts)->withTags($tags)->withCategories($categories);
    }

    public function postContact(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'subject' => 'min:3',
            'message' => 'required|min:10'
        ]);

        $data = array(
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->message
        );

        Mail::send('emails.contact', $data, function($message) use ($data){
            $message->from($data['email']);
            $message->to('henimastic@yahoo.com');
            $message->subject($data['subject']);
        });

        Session::flash('success', 'Your mail was Sent!');

        return redirect()->route('home');
    }
}
