<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // get all the nerds
        $categories = Category::all();
        // load the view and pass the nerds
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('category.create');
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
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'name'       => 'required|max:20',
            'description'      => 'required|max:50',
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the errors
        if ($validator->fails()) {
            return Redirect::to('category/create')
                ->withErrors($validator)
                ->withInput(Input::all());
        } else {
            // store
            $category = new Category;
            $category->Name = Input::get('name');
            $category->Description = Input::get('description');
            $category->save();

            // redirect
            Session::flash('message', 'Successfully created category!');
            return Redirect::to('category');
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
        //
        // get the nerd
        $category = Category::find($id);

        // show the view and pass the nerd to it
        return view('category.show')->with('category', $category);
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
        // get the nerd
        $category = Category::find($id);

        return view('category.edit')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        //
        $rules = array(
            'name'       => 'required|max:20',
            'description'      => 'required|max:50',
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the errors
        if ($validator->fails()) {
            return Redirect::to('category/'.$id.'/edit')
                ->withErrors($validator)
                ->withInput(Input::all());
        } else {
            // store
            $category = Category::find($id);
            $category->Name = Input::get('name');
            $category->Description = Input::get('description');
            $category->save();

            // redirect
            Session::flash('message', 'Successfully updated category!');
            return Redirect::to('category');
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
        $category = Category::find($id);
        try {
            $category->delete();
        } catch (\Illuminate\Database\QueryException $ex) {
            $message="";
            if ($ex->getCode() == 23000)
                $message = "The Category being deleted has souvenirs in it. Delete those souvenirs before trying again.";
            return Redirect::to('category')
                ->withErrors($message);
        }
        // redirect
        Session::flash('message', 'Successfully deleted the category!');
        return Redirect::to('category');
    }
}
