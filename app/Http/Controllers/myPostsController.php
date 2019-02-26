<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\myPost;
use App\Http\Requests\PostRequest;



class myPostsController extends Controller
{
  public function index() {
    // $posts = \App\Post::all();
          // $posts = myPost::all();
          // // $posts = Post::orderBy('created_at', 'desc')->get();
          $posts = myPost::latest()->get();
          // $posts =[];
                    // dd($posts->toArray()); // dump die
          // return view('posts.index', ['posts' => $posts]);
          return view('posts.index')->with('posts', $posts);

          // $posts = DB::table('my_posts')->pagenate(3);
          // return view('posts.index', ['posts' => $posts]);
    }

    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    public function show($id) {
      $post = myPost::findOrFail($id);
      $posts = myPost::latest()->get();
      return view('posts.show')->with('post', $post)->with('posts', $posts);

    }



    public function create() {
      // $post = new myPost();
      // $post->userName = $request->userName;
      // $post->email = $request->email;
      return view('posts.create');
    }

    public function store(PostRequest $request) {
      $post = new myPost();
      $post->title = $request->title;
      $post->body = $request->body;
      $post->userName = $request->userName;
      $post->email = $request->email;
      $post->save();
      return redirect('/');
    }

    public function edit(myPost $post) {
      return view('posts.edit')->with('post', $post);

    }

    public function update(PostRequest $request, myPost $post) {
      $post->title = $request->title;
      $post->body = $request->body;
      $post->save();
      return redirect('posts/myPage');
    }

    public function destroy(myPost $post) {
      $post->delete();
      return redirect()->back();
    }

    public function logout(Request $request)
    {
        auth::logout();
        return redirect('login');
    }

    public function myPage() {
      $posts = myPost::latest()->get();
      $post = new myPost();
      // $post->title = $request->title;
      // $post->body = $request->body;
      // $post->userName = $request->userName;
      // $post->email = $request->email;
      return view('posts.myPage')->with('post', $post)->with('posts', $posts);
    }

}
