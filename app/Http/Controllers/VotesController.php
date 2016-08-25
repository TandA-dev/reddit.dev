<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;
use App\Vote;



class VotesController extends Controller
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
<<<<<<< HEAD
=======
        //
>>>>>>> f673b9845c95dbc2a4d1c2aafab0abc79c6cc2ee
        $loggedInUser = Auth::user();
        $postToUpdate = Vote::firstOrCreate(array('user_id' => $loggedInUser->id, 'post_id' => $request->input('post_id'), 'vote' => $request->input('vote')));

        $postToUpdate->vote = $request->input('vote');
        $postToUpdate->save();

<<<<<<< HEAD
        return redirect()->action('PostsController@index');
=======
        return redirect()->action('PostsController@index'); //redirect to the index page
>>>>>>> f673b9845c95dbc2a4d1c2aafab0abc79c6cc2ee
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
<<<<<<< HEAD
        
=======
        //
>>>>>>> f673b9845c95dbc2a4d1c2aafab0abc79c6cc2ee
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
<<<<<<< HEAD
        
=======
        //

>>>>>>> f673b9845c95dbc2a4d1c2aafab0abc79c6cc2ee
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
