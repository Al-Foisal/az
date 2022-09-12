<?php

namespace App\Http\Controllers;
use App\Models\Message;
use App\Models\Product;
use App\Models\CategoryController;
use Illuminate\Http\Request;
use App\Models\ProductSubImage;
use Illuminate\Support\Str;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.products-manege',[
            'message'  => Message::orderBy('id','desc')->get(),
            'category' => CategoryController::orderBy('id' , 'desc')->get(),
            'Products' => Product::orderBy('id' , 'desc')->get(),

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
        $add_data = new Product();

        if($request->file('product_image')!='\0'){
    
            if($request->file('product_image')!='\0'){
        
                if ($image = $request->file('product_image')) {
                    $imagename = time() . '.' . $image->getClientOriginalName();
                    $directory = 'image/';
                    $image->move($directory, $imagename);
                    $imageurl = $directory . $imagename;
                }
             
              else {
                    $imageurl  = $add_data->product_image;
                }
            }
        }
            if( $imageurl)
      
            {
                $add_data->product_image = $imageurl;
                $add_data->save();
            }

        $add_data->category_id = $request->category_id;
        $add_data->product_name = $request->product_name;
        $add_data->product_slug = Str::slug($request->product_name);
        $add_data->price = $request->price;
        $add_data->d_price = $request->d_price;
        $add_data->qty = $request->qty;
        $add_data->color_1 = $request->color_1;
        $add_data->color_2 = $request->color_2;
        $add_data->color_3 = $request->color_3;
        $add_data->sm = $request->sm;
        $add_data->md = $request->md;
        $add_data->xl = $request->xl;
        $add_data->best_sellar = $request->best_sellar;
        $add_data->new_collection = $request->new_collection;
        $add_data->product_description = $request->product_description;
        $add_data->low_price = $request->low_price;
        $add_data->status = $request->status;
        $add_data->save();

        if(!empty($request->file('product_sub')))
        {


            if ($images = $request->file('product_sub')) {
                $subimages = ProductSubImage::where('product_sub', $add_data->id)->get();
                foreach ($subimages as $subimage) {
                    if (file_Exists($subimage->product_sub)) {
                        unlink(($subimage->product_sub));
                    }
                    $subimage->delete();
                }
    
                foreach ($images as $image) {
                    $imagename = $image->getClientOriginalName();
                    $directory = 'image/';
                    $image->move($directory, $imagename);
                    $imageurl3 = $directory . $imagename;
    
    
                    $subimage  = new ProductSubImage();
                    $subimage->product_id = $add_data->id;
                    $subimage->product_sub = $imageurl3;
                    $subimage->save();
                }
            }
        }
        toastr()->success('New product  has been saved successfully!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
      
       if($request->file('product_image')!='\0'){
    
        if($request->file('product_image')!='\0'){
    
            if ($image = $request->file('product_image')) {
                
     
        if (file_Exists($product->product_image)) {
            unlink(($product->product_image));
        }
            $product->delete();

                $imagename = time() . '.' . $image->getClientOriginalName();
                $directory = 'image/';
                $image->move($directory, $imagename);
                $imageurl = $directory . $imagename;
            }
         
          else {
                $imageurl  = $product->product_image;
            }
     

        if( $imageurl)
  
        {
            $product->product_image = $imageurl;
            $product->save();
        }
    }
   }
   
   $product->category_id = $request->category_id;
   $product->product_name = $request->product_name;
   $product->product_slug = Str::slug($request->product_name);
   $product->price = $request->price;
   $product->d_price = $request->d_price;
   $product->qty = $request->qty;
   $product->color_1 = $request->color_1;
   $product->color_2 = $request->color_2;
   $product->color_3 = $request->color_3;
   $product->sm = $request->sm;
   $product->md = $request->md;
   $product->xl = $request->xl;
   $product->best_sellar = $request->best_sellar;
   $product->new_collection = $request->new_collection;
   $product->product_description = $request->product_description;
   $product->low_price = $request->low_price;
   $product->status = $request->status;
   $product->save();

   if(!empty($request->file('product_sub')))
   {


       if ($images = $request->file('product_sub')) {
           $subimages = ProductSubImage::where('product_id', $product->id)->get();
           foreach ($subimages as $subimage) {
               if (file_Exists($subimage->product_sub)) {
                   unlink(($subimage->product_sub));
               }
               $subimage->delete();
           }

           foreach ($images as $image) {
               $imagename = $image->getClientOriginalName();
               $directory = 'image/';
               $image->move($directory, $imagename);
               $imageurl3 = $directory . $imagename;


               $subimage  = new ProductSubImage();
               $subimage->product_id = $product->id;
               $subimage->product_sub = $imageurl3;
               $subimage->save();
           }
       }
     }
     toastr()->success( 'Product '.'#'.$product->id. ' has been update successfully!');
     return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $sub= ProductSubImage::where('product_id',$product->id)->get();
        foreach($sub as $img){
            $img->delete();
        }
        $product->delete();
        toastr()->success( 'Product '.'#'.$product->id. ' has been delete successfully!');
        return redirect()->back();
    }
}
