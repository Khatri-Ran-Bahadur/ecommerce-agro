<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\About;
use App\Siteinfo;

class SettingController extends Controller
{

    //for about page
    public function aboutAdd(Request $request){
        $this->validate($request,[
            'title'=>'required|min:5',
            'description'=>'required|min:5',
            'video_link'=>'required'
        ]); 

        $about = About::create([
           'title'        => $request->title,
           'description'  => $request->description,
           'video_link'   => $request->video_link,
       ]);
        if($about)
            return back()->with('message',"Added Successfully");
        else
            return back()->with('error',"Sorry cannot added Successfully");
        
    }
    public function aboutUpdate(Request $request,$id){
        $this->validate($request,[
            'title'=>'required|min:5',
            'description'=>'required|min:5',
            'video_link'=>'required'
        ]); 

        $about=About::find($id);
        $about->title=$request->title;
        $about->description=$request->description;
        $about->video_link=$request->video_link;
        if($about->save())
            return back()->with('message',"Update Successfully");
        else
            return back()->with('error',"Sorry cannot update Successfully");    
        

    }

    //for about page
    public function siteinfoAdd(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'address'=>'required',
            'website_link'=>'required',
            'phone'=>'required',
            'location'=>'required'
        ]); 

        $siteinfo = Siteinfo::create([
           'name'        => $request->name,
           'email'       => $request->email,
           'address'     => $request->address,
           'phone'       => $request->phone,
           'website_link'=> $request->website_link,
           'location'    => $request->location,
       ]);
        if($siteinfo)
            return back()->with('message',"Added Successfully");
        else
            return back()->with('error',"Sorry cannot added Successfully");
        
    }
    public function siteinfoUpdate(Request $request,$id){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'address'=>'required',
            'website_link'=>'required',
            'phone'=>'required',
            'location'=>'required'
        ]);  

        $siteinfo=siteinfo::find($id);
        $siteinfo->name=$request->name;
        $siteinfo->email=$request->email;
        $siteinfo->address=$request->address;
        $siteinfo->phone=$request->phone;
        $siteinfo->website_link=$request->website_link;
        $siteinfo->location=$request->location;
        if($siteinfo->save())
            return back()->with('message',"Update Successfully");
        else
            return back()->with('error',"Sorry cannot update Successfully");    
        

    }
}
