<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\myPost;
use App\Comment2;
class CommentsController extends Controller
{

  public function store(Request $request, myPost $post) {
    $this->validate($request, [
      'body' => 'required'
    ]);
    $comment = new Comment2(['body' => $request->body]);
    $comment->userName = $request->userName;
    $comment->email = $request->email;
    $post->comments()->save($comment);
    return redirect()->action('myPostsController@show', $post);
  }

  public function destroy(myPost $post, Comment2 $comment) {
    $comment->delete();
    return redirect()->back();
  }
}
