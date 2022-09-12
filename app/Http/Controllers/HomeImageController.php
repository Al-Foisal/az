<?php

namespace App\Http\Controllers;
use App\Models\SiteSetting;

use App\Models\Message;
;
use Illuminate\Http\Request;

class HomeImageController extends Controller
{/*
    public function index (){
        return view('admin.home-image',[
            'home_image'  => HomeImage::orderBy('id', 'desc')->get(),
            'site'  => SiteSetting::first(),
            'message'  => Message::orderBy('id','desc')->get(),
        ]);
    }
    public function store(Request $request){

      $add_data = new HomeImage();

      if($request->file('home_image')!='\0'){
    
        if($request->file('home_image')!='\0'){
    
            if ($image = $request->file('home_image')) {
                $imagename = time() . '.' . $image->getClientOriginalName();
                $directory = 'image/';
                $image->move($directory, $imagename);
                $imageurl = $directory . $imagename;
            }
         
          else {
                $imageurl  = $add_data->home_image;
            }
        }
    }
        if( $imageurl)
  
        {
            $add_data->home_image = $imageurl;
            $add_data->save();
        }
            $add_data->title = $request->title;
            $add_data->category_id = $request->category_id;
            $add_data->client = $request->client;
            $add_data->brief = $request->brief;
            $add_data->status = $request->status;
        
           $add_data->save();
      if(!empty($request->file('home_sub')))
      {


          if ($images = $request->file('home_sub')) {
              $subimages = HomeSubimage::where('sub_image_id', $add_data->id)->get();
              foreach ($subimages as $subimage) {
                  if (file_Exists($subimage->home_sub)) {
                      unlink(($subimage->home_sub));
                  }
                  $subimage->delete();
              }
  
              foreach ($images as $image) {
                  $imagename = $image->getClientOriginalName();
                  $directory = 'image/';
                  $image->move($directory, $imagename);
                  $imageurl3 = $directory . $imagename;
  
  
                  $subimage  = new HomeSubimage();
                  $subimage->sub_image_id = $add_data->id;
                  $subimage->home_sub = $imageurl3;
                  $subimage->save();
              }
          }
      }
    
    
      return redirect()->back()->with('message', ' New Image add successfully !!');
    }

    public function update(Request $request){

        $add_data =  HomeImage::find($request->id);
  
        if($request->file('home_image')!='\0'){
            if($request->file('home_image')!='\0'){
        
                if ($image = $request->file('home_image')) {
                    
         
            if (file_Exists($add_data->home_image)) {
                unlink(($add_data->home_image));
            }
                $add_data->delete();

                    $imagename = time() . '.' . $image->getClientOriginalName();
                    $directory = 'image/';
                    $image->move($directory, $imagename);
                    $imageurl = $directory . $imagename;
                }
             
              else {
                    $imageurl  = $add_data->home_image;
                }
         
  
            if( $imageurl)
      
            {
                $add_data->home_image = $imageurl;
                $add_data->save();
            }
        }
        
          }
              $add_data->category_id = $request->category_id;
              $add_data->title = $request->title;
              $add_data->client = $request->client;
              $add_data->brief = $request->brief;
              $add_data->status = $request->status;
          
             $add_data->save();
        if(!empty($request->file('home_sub')))
        {
  
  
            if ($images = $request->file('home_sub')) {
                $subimages = HomeSubimage::where('sub_image_id', $request->id)->get();
                foreach ($subimages as $subimage) {
                    if (file_Exists($subimage->home_sub)) {
                        unlink(($subimage->home_sub));
                    }
                    $subimage->delete();
                }
    
                foreach ($images as $image) {
                    $imagename = $image->getClientOriginalName();
                    $directory = 'image/';
                    $image->move($directory, $imagename);
                    $imageurl3 = $directory . $imagename;
    
    
                    $subimage  = new HomeSubimage();
                    $subimage->sub_image_id = $request->id;
                    $subimage->home_sub = $imageurl3;
                    $subimage->save();
                }
            }
        }
      
      
        return redirect()->back()->with('message', ' Update Image  successfully !!');
      }
      public function delete($id){

        $add_data =  HomeImage::find($id);
        $add_data->delete();
        return redirect()->back()->with('message', ' Delete Image  successfully !!');
      }
  
*/
}
