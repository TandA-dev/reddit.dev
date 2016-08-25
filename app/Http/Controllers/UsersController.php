<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;


class UsersController extends Controller
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

      return view('auth/register');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = new User();
        return $this->validateAndSave($user, $request);
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

        $user = User::find($id);
        if($user == NULL) {
            abort(404);
        }
        $data = ['user' => $user];
        // $message = 'You successfully made your edits!';
        // $request->session()->flash('successMessage', $message);
        return view("/users/edit_user", $data);

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
      $user = User::find($id);
      return $this->validateAndSave($user, $request); //send to method below
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

    private function validateAndSave(User $user, Request $request){
        $request->session()->flash('ERROR_MESSAGE', 'User was not created successfully'); //set error message if not saved
        $this->validate($request, User::$rules); //validate that alll fields are filled out correctly
        $request->session()->forget('ERROR_MESSAGE'); // if validated, tell to forget the error message
        if(!$user){
            abort('404'); // send to custom 404 page if not post is not found
        }

        $user->name = $request->name; //can use $user->title = $request->input('title') alternatively
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save(); //save when submited
        // Log::info('User successfully creates post', $request->all()); // create custom log when post is created
        $request->session()->flash('message', 'User was saved successfully'); // flash success message when saved
        return redirect()->action('PostsController@account'); //redirect to the index page
    }
}
