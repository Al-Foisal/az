<?php

namespace App\Http\Controllers;
use App\Models\AllPage;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    public function add_site_setting(Request $request){
        $add_data   = SiteSetting::find('1');
        if($request->file('slogo')!='\0'){
        
            if ($image = $request->file('slogo')) {
                if (file_Exists($add_data->slogo)) {
                    unlink(($add_data->slogo));
                }
            $imagename = time() . '.' . $image->getClientOriginalName();
            $directory = 'image/';
            $image->move($directory, $imagename);
            $imageurl = $directory . $imagename;
        }
       
      else {
            $imageurl  = $add_data->slogo;
        }  
        }


            if( $imageurl)

            {
                $add_data->slogo = $imageurl;
                $add_data->save();
             
            }
            if($request->file('mlogo')!='\0'){
        
                if ($image = $request->file('mlogo')) {
                    if (file_Exists($add_data->mlogo)) {
                        unlink(($add_data->mlogo));
                    }
                $imagename = time() . '.' . $image->getClientOriginalName();
                $directory = 'image/';
                $image->move($directory, $imagename);
                $imageurl1 = $directory . $imagename;
            }
           
          else {
                $imageurl1  = $add_data->mlogo;
            }  
            }
    
    
                if( $imageurl1)
    
                {
                    $add_data->mlogo = $imageurl1;
                    $add_data->save();
                 
                }
          
        
        $add_data->title = $request->title;
        $add_data->name = $request->name;
        $add_data->about_site = $request->about_site;
        $add_data->email = $request->email;
        $add_data->social_icon_1 = $request->social_icon_1;
        $add_data->social_icon_2 = $request->social_icon_2;
        $add_data->social_icon_3 = $request->social_icon_3;
        $add_data->social_icon_4 = $request->social_icon_4;
        $add_data->about = $request->about;
        $add_data->privacy = $request->privacy;
        $add_data->terms = $request->terms;
        $add_data->delivery_charge = $request->delivery_charge;
        
        $add_data->social_link_4 = $request->social_link_4;
        $add_data->address = $request->address;
        $add_data->phone1 = $request->phone1;
        $add_data->phone2 = $request->phone2;
        $add_data->footer = $request->footer;
        $add_data->header_code = $request->title;
        
        $add_data->save();
        toastr()->success('Data has been saved successfully!');
        return redirect()->back();
     
    }
   
}
