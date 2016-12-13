<?php

namespace Blogger\Http\Controllers;

use Illuminate\Http\Request;

use Blogger\Http\Requests;

use Blogger\Comment;

use Blogger\Post;

use Blogger\Category;

use Blogger\Tag;

use Session;

use View;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'comment' => 'required|min:5|max:255'
        ]);

        $post = Post::find($request['postId']);

        $comment = new Comment;

        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $comment->approved = true;
        $comment->post()->associate($post);

        $comment->save();

        return view('commentsLoop', compact('comment'));

        /*$time = date('F nS, Y - g:iA', strtotime($comment->created_at));*/

        /*if (View::exists('comments.loop')) {
            return view('comments.loop')->withComment($comment);
        }*/ 

        /*Session::flash('success', 'Comment added');*/
       /*if ($comment->save()){
            return Response()
            ->json([View::make('commentsLoop', $post)], 200);
       }
    */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment = Comment::find($id);

        return view('comments.show')->withComment($comment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::find($id);

        return view('comments.edit')->withComment($comment);
    }


    public function commentLikes(Request $request)
    {
        $commentId = $request["commentId"];
        $comment = Comment::find($commentId);
    
        $like = $comment->likes()->create([]);
        
        $comment->likes()->save($like);

        return view('commentLikeCount')->withComment($comment);
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
        $comment = Comment::find($id);

        $this->validate($request, [
            'comment' => 'required|max:255'
        ]);

        $comment = Comment::find($id);

        $comment->comment = $request->comment;

        $comment->save();

        Session::flash('success', 'Comment update succesfull');

        return redirect()->route('posts.show', $comment->post->id);
    }


    public function delete($id)
    {
        $comment = Comment::find($id);
        $categories = Category::all();
        $tags = Tag::all();

        return view('comments.delete')->withComment($comment)->withCategories($categories)
        ->withTags($tags);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);

        $post_id = $comment->post->id;

        $comment->delete();

        Session::flash('success', 'Comment Deleted');

        return redirect()->route('posts.show', $post_id);
    }
}
