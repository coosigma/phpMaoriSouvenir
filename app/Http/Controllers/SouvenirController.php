<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Souvenir;
use App\Category;
use App\Supplier;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Session;


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
        $category = $request->input("category");
        if (!isset($lower_price))
            $lower_price = 0;
        if (!isset($upper_price))
            $upper_price =  PHP_INT_MAX;
        if (!isset($category) || $category == 'AllCategories')
            $category = "";

        switch ($sort_mode) {
            case "name":
                $souvenirs = Souvenir::where('Name', 'like', "%$search_str%")->whereBetween('Price', [$lower_price, $upper_price])->whereHas('category', function($q) use ($category){$q->where('Name', 'like', "%$category%");})->orderby('Name')->paginate(5);
                break;
            case "name_desc":
                $souvenirs = Souvenir::where('Name', 'like', "%$search_str%")->whereBetween('Price', [$lower_price, $upper_price])->whereHas('category', function($q) use ($category){$q->where('Name', 'like', "%$category%");})->orderby('Name', 'DESC')->paginate(5);
                break;
            case "price":
                $souvenirs = Souvenir::where('Name', 'like', "%$search_str%")->whereBetween('Price', [$lower_price, $upper_price])->whereHas('category', function($q) use ($category){$q->where('Name', 'like', "%$category%");})->orderby('Price')->paginate(5);
                break;
            case "price_desc":
                $souvenirs = Souvenir::where('Name', 'like', "%$search_str%")->whereBetween('Price', [$lower_price, $upper_price])->whereHas('category', function($q) use ($category){$q->where('Name', 'like', "%$category%");})->orderby('Price', 'DESC')->paginate(5);
                break;
            default:
                $souvenirs = Souvenir::where('Name', 'like', "%$search_str%")->whereBetween('Price', [$lower_price, $upper_price])->whereHas('category', function($q) use ($category){$q->where('Name', 'like', "%$category%");})->orderby('id')->paginate(5);
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
        $categories = Category::all();
        $suppliers = Supplier::all();
        return view('souvenir.create', compact('categories', 'suppliers'));
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
            'name'       => 'required|max:20',
            'description'      => 'required|max:50',
            'price' => 'required|regex:/^\d*(\.\d{1,2})?$/|max:20',
            'supplier' => 'required',
            'category' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the errors
        if ($validator->fails()) {
            return Redirect::to('souvenir/create')
                ->withErrors($validator)
                ->withInput(Input::all());
        } else {
            // store
            $souvenir = new Souvenir;
            $souvenir->Name = Input::get('name');
            $souvenir->Description = Input::get('description');
            $souvenir->Price = Input::get('price');
            $souvenir->CategoryID = Input::get('category');
            $souvenir->SupplierID = Input::get('supplier');
            $file = Input::file('photo');
            if (isset($file) && $file->isValid()) {
                // 获取文件相关信息
                $originalName = $file->getClientOriginalName(); // 文件原名
                $ext = $file->getClientOriginalExtension();     // 扩展名
                $realPath = $file->getRealPath();   //临时文件的绝对路径
                $type = $file->getClientMimeType();     // image/jpeg
                // 上传文件
                $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;
                // 使用我们新建的uploads本地存储空间（目录）
                $file->move('img', $filename);
                $souvenir->PhotoPath = '/img/'.$filename;
            } else {
                $souvenir->PhotoPath = '';
            }
            $souvenir->save();

            // redirect
            Session::flash('message', 'Successfully created souvenir!');
            return Redirect::to('souvenir');
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
      // get the souvenir
        $souvenir = Souvenir::find($id);
        $err_photo = '/img/Error.svg';
        // show the view and pass the souvenir to it
        return view('souvenir.show', compact('souvenir', 'err_photo'));
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
        $souvenir = souvenir::find($id);
        $categories = Category::all();
        $suppliers = Supplier::all();
        return view('souvenir.edit', compact('souvenir', 'categories', 'suppliers'));
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
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'name'       => 'required|max:20',
            'description'      => 'required|max:50',
            'price' => 'required|regex:/^\d*(\.\d{1,2})?$/|max:20',
            'supplier' => 'required',
            'category' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the errors
        if ($validator->fails()) {
            return Redirect::to('souvenir/create')
                ->withErrors($validator)
                ->withInput(Input::all());
        } else {
            // update
            $souvenir = Souvenir::find($id);
            $souvenir->Name = Input::get('name');
            $souvenir->Description = Input::get('description');
            $souvenir->Price = Input::get('price');
            $souvenir->CategoryID = Input::get('category');
            $souvenir->SupplierID = Input::get('supplier');
            $file = Input::file('photo');
            if (isset($file) && $file->isValid()) {
                // 获取文件相关信息
                $originalName = $file->getClientOriginalName(); // 文件原名
                $ext = $file->getClientOriginalExtension();     // 扩展名
                $realPath = $file->getRealPath();   //临时文件的绝对路径
                $type = $file->getClientMimeType();     // image/jpeg
                // 上传文件
                $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;
                // 使用我们新建的uploads本地存储空间（目录）
                $file->move('img', $filename);
                $souvenir->PhotoPath = '/img/'.$filename;
            }
            $souvenir->save();

            // redirect
            Session::flash('message', 'Successfully updated souvenir!');
            return Redirect::to('souvenir');
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
        $souvenir = Souvenir::find($id);
        try {
            $souvenir->delete();
        } catch (\Illuminate\Database\QueryException $ex) {
            $message="";
            if ($ex->getCode() == 23000)
                $message = "The Souvenir being deleted belongs to some orders. Delete those orders before trying again.";
            return Redirect::to('souvenir')
                ->withErrors($message);
        }
        // redirect
        Session::flash('message', 'Successfully deleted the souvenir!');
        return Redirect::to('souvenir');
    }
}
