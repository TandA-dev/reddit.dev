<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
 {
     $this->middleware('auth');
 }
    public function index()
    {
      $posts = Post::paginate(4);

      return view('posts/index')->with(array('posts' => $posts));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('/posts/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $this->validate($request, Post::$rules);

      $post1 = new Post();
      $post1->title = $request->input('title');
      $post1->url= $request->input('url');
      $post1->content= $request->input('content');
      $post1->created_by=Auth::user()->id;
      $post1->save();
      $message = 'You created a new entry!';
      $request->session()->flash('successMessage', $message);
      // Log::info("Created new post titled {$post->title}");
      return redirect()->action('PostsController@index');
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
        $post = Post::find($id);
        if($post == NULL) {
          abort(404);
        }
        $data = ['post' => $post];
        return view("/posts/show", $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //
        $post = Post::find($id);
        if($post == NULL) {
          abort(404);
        }
        $data = ['post' => $post];
        // $message = 'You successfully made your edits!';
        // $request->session()->flash('successMessage', $message);
        return view("/posts/edit", $data);
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
        $post = Post::find($id);
        if($post == NULL) {
          abort(404);
        }

        $this->validate($request, Post::$rules);

        $post->title = $request->input('title');
        $post->url= $request->input('url');
        $post->content= $request->input('content');
        $post->save();
        $message = 'You updated your entry!';
        $request->session()->flash('successMessage', $message);
        // Log::info("Updated post number {$post->id} with title {$post->title}");
        return redirect()->action('PostsController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        $post = Post::find($id);
        if($post == NULL) {
          abort(404);
        }
        $post->delete();
        $message = 'You deleted your entry!';
        $request->session()->flash('successMessage', $message);
        // Log::info("Updated post number {$post->id} with title {$post->title}");
        return redirect()->action('PostsController@index');
    }
}
