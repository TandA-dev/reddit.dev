<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use App\Vote;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct() {
        $this->middleware('auth');
    }

    public function index(){
        $posts = Post::withVotes()->paginate(6);
        $loggedInUser = Auth::user();
        return view('posts/index')->with(array('posts' => $posts));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('/posts/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $loggedInUser = Auth::user();
        $post = new Post();
        $post->created_by = $loggedInUser->id; // leave created_by here and not in validateAndSave - you don't want to allow a user to change the created_by column
        return $this->validateAndSave($post, $request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $user = User::find($id);
        if($user == NULL) {
          abort(404);
        };
        $posts = User::find($id)->posts;
        return view("/posts/show")->with(array('posts' => $posts));
    }

    public function account(){
      $loggedInUser = Auth::user();
      $posts = User::find($loggedInUser->id)->posts;
       return view("/posts/account")->with(array('posts' => $posts, 'loggedInUser' => $loggedInUser));
    }

    public function search(Request $request){
      if($request->option == 'name'){
        $users = User::user($request->search);
        return view('/posts/search_name')->with(array('users' => $users));

      } elseif($request->option == 'title'){
          $posts = Post::searchTitle($request->search)->paginate(6);
          return view('/posts/search_title')->with(array('posts' => $posts));
      }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id){
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
    public function update(Request $request, $id){
        $post = Post::find($id);
        return $this->validateAndSave($post, $request); //send to method below
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    private function validateAndSave(Post $post, Request $request){
        $request->session()->flash('ERROR_MESSAGE', 'Post was not saved successfully'); //set error message if not saved
        $this->validate($request, Post::$rules); //validate that alll fields are filled out correctly
        $request->session()->forget('ERROR_MESSAGE'); // if validated, tell to forget the error message
        if(!$post){
            abort('404'); // send to custom 404 page if not post is not found
        }
        $post->title = $request->title; //can use $post->title = $request->input('title') alternatively
        $post->url = $request->url;
        $post->content = $request->content;
        $post->save(); //save when submited
        // Log::info('User successfully creates post', $request->all()); // create custom log when post is created
        $request->session()->flash('message', 'Post was saved successfully'); // flash success message when saved
        return redirect()->action('PostsController@index'); //redirect to the index page
    }




    public function destroy(Request $request, $id){
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
