<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\UserProfile;

class UserProfileController extends Controller
{
    public function create(){
        return view('userprofile.create');
    }

    public function save(request $request){
        $image = $request->file('image'); 
        $path = 'profile_pictures/' . $image->getClientOriginalName();

         Storage::disk('public')->put($path, file_get_contents($image));

        UserProfile::create([
            'image' => $path
        ]);

        return redirect()-> route('userprofile.lists');
    }

    public function lists(){
        $userProfiles = UserProfile::all();
        return view('userprofile.lists', compact('userProfiles'));
    }

    public function edit($id)
    {
        $userprofile = UserProfile::find($id);
        return view('userprofile.create', compact('userprofile'));
    }

    public function update(request $request,$id){

        $userprofile = UserProfile::find($id);

        if ($request->hasFile('image')) {

            if ($userprofile->image) {
                Storage::disk('public')->delete($userprofile->image);
            }

            $image = $request->file('image'); 
            $path = 'profile_pictures/' . $image->getClientOriginalName();

            Storage::disk('public')->put($path, file_get_contents($image));

            $userprofile->update([
                'image' => $path,
            ]);
        }
        return redirect()->route('userprofile.lists');
    }

    public function delete($id) {

        $userprofile = UserProfile::find($id);
            if ($userprofile->image) {
                Storage::disk('public')->delete($userprofile->image);
            }
        $userprofile->delete();
        return redirect()->route('userprofile.lists');

    }
}

