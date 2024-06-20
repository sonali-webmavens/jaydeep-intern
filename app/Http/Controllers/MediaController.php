<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;

class MediaController extends Controller
{
    public function create(){
        return view('media-library.create');
    }

    public function save(request $request){


        $media = Media::create([
            'title' => $request->input('title')
        ]);
        $media->addMediaFromRequest('image')->toMediaCollection('post_image');
        
       
       return redirect()->route('media.lists');
    }

    public function lists(){
        $media=Media::all();
        return view('media-library.lists',compact('media'));
    }

    public function edit($id){
        $media=Media::find($id);

        return view('media-library.create',compact('media'));
    }

    public function update(request $request ,$id){
        $media=Media::find($id);
        $media->title = $request->input('title');
        $media->save();

    
        if ($request->hasFile('image')) {
            
            $media->addMediaFromRequest('image')->toMediaCollection('post_image');
        }
        return redirect()->route('media.lists');
    }
}
