<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Session;

class AccountController extends Controller
{
    //
    public function account()
    {
      $id = Auth::id();
      // get the member
        $user = User::find($id);
        $title = 'Edit Account';
        return view('member.edit', compact('user', 'title'));
    }

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
        return Redirect::to(url('account'))
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
        Session::flash('message', 'Successfully updated account!');
        return Redirect::to('account');
      }
    }
}
