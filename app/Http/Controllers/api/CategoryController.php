<?php

namespace App\Http\Controllers\api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('auth:sanctum')->except('index','show');
    }

    public function index()
    {
        $categories=Category::paginate(2);

        if (isset($categories)) {
            return response()->json([

                'data'=>$categories,
                'status' => 'Success',
            ]);
        }else {
            return response()->json([

                'status' => 'fail',
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'description'=>'required|string',
            'photo'=>'required',
        ]);

        $created = Category::create($request->all());

        if ($created) {

            return response()->json([
            'data'=>$created,
            'status'=>'success',
            ]);
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
        $category=Category::find($id);

        if (isset($category)) {
            return response()->json([

                'data'=>$category,
                'status' => 'Success',
            ]);
        }else {
            return response()->json([
                'message'=>'not found',
                'status' => 'fail',
            ]);
        }
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
        $request->validate([
            'name'=>'required|string|max:255',
            'description'=>'string',
            'photo'=>'string',
        ]);

        $category = Category::find($id);

        if ($category) {
            $category->update($request->all());
            return response()->json([
                'data'=>$category,
                'message'=>'your category is updated Done',
                'status'=>'success',
            ]);
        }else {
            return response()->json([
                'message'=>'Something wrong Try Again',
                'status'=>'fail',
            ]);
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
        $deleted = Category::destroy($id);
        return response()->json([
            'message'=>'Category deleted Done',
            'status'=>'success',
        ]);
    }
}
