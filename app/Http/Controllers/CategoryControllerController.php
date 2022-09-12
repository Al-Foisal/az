<?php

namespace App\Http\Controllers;
use App\Models\Message;
use App\Models\CategoryController;
use Illuminate\Support\Str;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryControllerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category-manege',[
            'message'  => Message::orderBy('id','desc')->get(),
            'category' => CategoryController::orderBy('id' , 'desc')->get(),

        ]);
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
       $data_add = new CategoryController();
       $data_add->category_name = $request->category_name;
       $data_add->category_slug = Str::slug($request->category_name);
       $data_add->status = $request->status;
       $data_add->save();
       toastr()->success('Data has been saved successfully!');
       return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryController  $categoryController
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryController $categoryController)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryController  $categoryController
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryController $categoryController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryController  $categoryController
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryController $categoryController)
    {
        $data_add = CategoryController::find($request->id);
        $data_add->category_name = $request->category_name;
        $data_add->category_slug = Str::slug($request->category_name);
        $data_add->status = $request->status;
        $data_add->save();
        toastr()->success('Data has been update successfully!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryController  $categoryController
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {

       $product = Product::where('category_id',$id)->first();
       if(empty($product)){
        $category = CategoryController::find($id);
        $category->delete();
        toastr()->success($category->category_name .' has been delete successfully!');
         return redirect()->back();
       }
      
        else{
            $category = CategoryController::find($id);
            toastr()->error($category->category_name .' category used in product, if you delete this category first change your specific product category!');
            return redirect()->back();
        }

    }
}
