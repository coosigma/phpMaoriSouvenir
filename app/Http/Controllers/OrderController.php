<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
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
      // // validate
      //   // read more on validation at http://laravel.com/docs/validation
      //   $rules = array(
      //       'first_name'       => 'required|max:50',
      //       'last_name'       => 'required|max:50',
      //       'description'      => 'required|max:50',
      //       'phone_number'      => 'required|max:50',
      //       'email'      => 'required|max:50',
      //       'address'      => 'required|max:100',
      //   );
      //   $validator = Validator::make(Input::all(), $rules);
      //
      //   // process the errors
      //   if ($validator->fails()) {
      //       return Redirect::to('supplier/create')
      //           ->withErrors($validator)
      //           ->withInput(Input::all());
      //   } else {
      //       // store
      //       $supplier = new Supplier();
      //       $supplier->FirstName = Input::get('first_name');
      //       $supplier->LastName = Input::get('last_name');
      //       $supplier->Email = Input::get('email');
      //       $supplier->Address = Input::get('address');
      //       $supplier->PhoneNumber = Input::get('phone_number');
      //       $supplier->Description = Input::get('description');
      //       $supplier->save();
      //
      //       // redirect
      //       Session::flash('message', 'Successfully created supplier!');
      //       return Redirect::to('supplier');
      //   }
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
