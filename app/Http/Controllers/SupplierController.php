<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Session;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all the suppliers
        $suppliers = Supplier::all();
        // load the view and pass the nerds
        return view('supplier.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'first_name'       => 'required|max:50',
            'last_name'       => 'required|max:50',
            'description'      => 'required|max:50',
            'phone_number'      => 'required|max:50',
            'email'      => 'required|max:50',
            'address'      => 'required|max:100',
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the errors
        if ($validator->fails()) {
            return Redirect::to('supplier/create')
                ->withErrors($validator)
                ->withInput(Input::all());
        } else {
            // store
            $supplier = new Supplier();
            $supplier->FirstName = Input::get('first_name');
            $supplier->LastName = Input::get('last_name');
            $supplier->Email = Input::get('email');
            $supplier->Address = Input::get('address');
            $supplier->PhoneNumber = Input::get('phone_number');
            $supplier->Description = Input::get('description');
            $supplier->save();

            // redirect
            Session::flash('message', 'Successfully created supplier!');
            return Redirect::to('supplier');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get the supplier
        $supplier = Supplier::find($id);

        // show the view and pass the supplier to it
        return view('supplier.show')->with('supplier', $supplier);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get the supplier
        $supplier = Supplier::find($id);
        return view('supplier.edit')->with('supplier', $supplier);
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
        $rules = array(
            'first_name'       => 'required|max:50',
            'last_name'       => 'required|max:50',
            'description'      => 'required|max:50',
            'phone_number'      => 'required|max:50',
            'email'      => 'required|max:50',
            'address'      => 'required|max:100',
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the errors
        if ($validator->fails()) {
            return Redirect::to('supplier/'.$id.'/edit')
                ->withErrors($validator)
                ->withInput(Input::all());
        } else {
            // store
            $supplier = Supplier::find($id);
            $supplier->FirstName = Input::get('first_name');
            $supplier->LastName = Input::get('last_name');
            $supplier->Email = Input::get('email');
            $supplier->Address = Input::get('address');
            $supplier->PhoneNumber = Input::get('phone_number');
            $supplier->Description = Input::get('description');
            $supplier->save();

            // redirect
            Session::flash('message', 'Successfully updated supplier!');
            return Redirect::to('supplier');
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
        $supplier = Supplier::find($id);
        try {
            $supplier->delete();
        } catch (\Illuminate\Database\QueryException $ex) {
            $message="";
            if ($ex->getCode() == 23000)
                $message = "The Supplier being deleted has souvenirs in it. Delete those souvenirs before trying again.";
            return Redirect::to('supplier')
                ->withErrors($message);
        }
        // redirect
        Session::flash('message', 'Successfully deleted the supplier!');
        return Redirect::to('supplier');
    }
}
