<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Souvenir;
use App\Http\Controllers\Controller;

class SouvenirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $err_photo = '/img/Error.svg';

        $search_str = $request->input("search_str");
        $sort_mode =  $request->input("sort_mode");
        $lower_price = $request->input("lower_price");
        $upper_price = $request->input("upper_price");
        if (!isset($lower_price))
            $lower_price = 0;
        if (!isset($upper_price))
            $upper_price =  PHP_INT_MAX;

        switch ($sort_mode) {
            case "name":
                $souvenirs = Souvenir::where('Name', 'like', "%$search_str%")->whereBetween('Price', [$lower_price, $upper_price])->orderby('Name')->paginate(5);
                break;
            case "name_desc":
                $souvenirs = Souvenir::where('Name', 'like', "%$search_str%")->whereBetween('Price', [$lower_price, $upper_price])->orderby('Name', 'DESC')->paginate(5);
                break;
            case "price":
                $souvenirs = Souvenir::where('Name', 'like', "%$search_str%")->whereBetween('Price', [$lower_price, $upper_price])->orderby('Price')->paginate(5);
                break;
            case "price_desc":
                $souvenirs = Souvenir::where('Name', 'like', "%$search_str%")->whereBetween('Price', [$lower_price, $upper_price])->orderby('Price', 'DESC')->paginate(5);
                break;
            default:
                $souvenirs = Souvenir::where('Name', 'like', "%$search_str%")->whereBetween('Price', [$lower_price, $upper_price])->orderby('id')->paginate(5);
        }

        return view('souvenir.index', compact('souvenirs', 'err_photo',
            'sort_mode', 'lower_price', 'upper_price', 'search_str'));
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
