<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Session;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all the default users
        $users = User::where('type', 'default')->get();
        // load the view and pass the nerds
        return view('member.index', compact('users'));
    }

    public function changeUserEnabled(Request $req) {
      $id = Input::get('id');
      $user = User::find($id);
      $updated = [];
      if ($user->Enabled == 0) {
        $user->Enabled = 1;
        $updated['status'] = 'No';
        $updated['button'] = 'Enable';
      } else {
        $user->Enabled = 0;
        $updated['status'] = 'Yes';
        $updated['button'] = 'Disable';
      }
      $user->save();
      $response = array(
        'status' => 'success',
        'data' => $updated,
        'message' => "status changed."
      );
      return response()->json($response);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get the user
        $user = User::find($id);
        // show the view and pass the user to it
        return view('member.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      // get the member
        $user = User::find($id);
        $title = 'Edit member: '.$id;
        return view('member.edit', compact('user', 'title'));
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
      $rules = array(
            'name' => 'required|max:20',
            'first_name'       => 'required|max:50',
            'last_name'       => 'required|max:50',
            'phone_number'      => 'required|max:50',
            'address'      => 'required|max:100',
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the errors
        if ($validator->fails()) {
            return Redirect::to('member/'.$id.'/edit')
                ->withErrors($validator)
                ->withInput(Input::all());
        } else {
            // store
            $user = User::find($id);
            $user->name = Input::get('name');
            $user->FirstName = Input::get('first_name');
            $user->LastName = Input::get('last_name');
            $user->Address = Input::get('address');
            $user->PhoneNumber = Input::get('phone_number');
            $user->save();

            // redirect
            Session::flash('message', 'Successfully updated user!');
            return Redirect::to('member');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete
        $user = User::find($id);
        try {
            $user->delete();
        } catch (\Illuminate\Database\QueryException $ex) {
            $message="";
            if ($ex->getCode() == 23000)
                $message = "The User being deleted has some orders. Delete those orders before trying again.";
            return Redirect::to('member')
                ->withErrors($message);
        }
        // redirect
        Session::flash('message', 'Successfully deleted the member!');
        return Redirect::to('member');
    }
}
