<?php

namespace Blogger\Http\Controllers;

use Illuminate\Http\Request;

use Blogger\Http\Requests;

use Blogger\Comment;

use Blogger\Reply;

use Session;

class RepliesController extends Controller
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
            'reply' => 'required|max:255'
        ]);

        $comment = Comment::find($request['commentId']);

        $reply = new Reply;

        $reply->name = $request->name;
        $reply->email = $request->email;
        $reply->reply = $request->reply;
        $reply->approved = true;
        $reply->comment()->associate($comment);

        $reply->save();

        return view('repliesLoop', compact('reply'));


        /*Session::flash('success', 'Reply added');

        return redirect()->back();*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function replyLikes(Request $request)
    {
        $replyId = $request["replyId"];

        $reply = Reply::find($replyId);

        $like = $reply->likes()->create([]);

        $reply->likes()->save($like);

        return view('replyLikeCount')->withReply($reply);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
