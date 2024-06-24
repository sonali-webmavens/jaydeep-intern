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
        $medias=Media::all();
        return view('media-library.lists',compact('medias'));
    }

    public function edit($id){
        $media=Media::find($id);

        return view('media-library.create',compact('media'));
    }

    public function update(request $request ,$id){
        $media=Media::find($id);
        $media->update([
            'title' =>$request->input('title')
        ]);
    
        if ($request->hasFile('image')) {
            $media->clearMediaCollection('post_image');
            $media->addMediaFromRequest('image')->toMediaCollection('post_image');
        }
        
        return redirect()->route('media.lists');
    }

    public function delete($id){
        $media=Media::find($id);
        $media->delete();

        return back();
    }
}
