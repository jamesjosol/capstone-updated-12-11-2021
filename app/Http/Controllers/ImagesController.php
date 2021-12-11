<?php

namespace App\Http\Controllers;

use App\Models\Images;
use Illuminate\Http\Request;

class ImagesController extends Controller
{
    public function index(){
        $data = Images::all();
        return view ('form_upload', compact('data'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'filename'=> 'required',
            'filename.*'=> 'image|mimes:jpeg,png,jpg,,gif,svg|max:2048'
        ]);

        if($request->hasfile('filename')){
            foreach($request->file('filename') as $image){
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/image/', $name);
                $data[] = $name;
            }
        }

        $Upload_model = new Images;
        $Upload_model->filename = json_encode($data);
        $Upload_model->save();
        return back()->with('success', 'Your images has been added successfully');
    }

}
