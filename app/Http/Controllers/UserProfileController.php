<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\UserProfile;

class UserProfileController extends Controller
{
    public function create()
    {
        return view('userprofile.create');
    }

    public function save(Request $request)
    {
        
        $files = $request->file('image');
        $uploadedFiles = [];
        
        foreach ($files as $file) {
            $imagename=$file->getClientOriginalName();
            $filePath = 'jaydeep-test/files/' . $imagename;
           Storage::disk('s3')->put($filePath, file_get_contents($file));
           Storage::disk('s3')->url($filePath);

           $uploadedFiles[] = $imagename;
        }

        UserProfile::create([
            'image' => json_encode($uploadedFiles)
        ]);

        return redirect()->route('userprofile.lists');
    }

    public function lists()
    {
        $userProfiles = UserProfile::all();
        return view('userprofile.lists', compact('userProfiles'));
    }

    public function edit($id)
    {
        $userProfile = UserProfile::find($id);
        return view('userprofile.create', ['userprofile' => $userProfile]);
    }

    public function update(Request $request, $id)
    {
        $userProfile = UserProfile::find($id);
       
        if ($request->hasFile('image')) {
            $files = $request->file('image');

            $oldFiles = json_decode($userProfile->image, true);
            foreach ($oldFiles as $oldFile) {
                Storage::disk('s3')->delete($oldFile);
            }

            $uploadedFiles = [];
            foreach ($files as $file) {
                $imagename=$file->getClientOriginalName();
                $filePath = 'jaydeep-test/files/' . $imagename;
                Storage::disk('s3')->put($filePath, file_get_contents($file));
                $uploadedFiles[] = $imagename;
            }
            $userProfile->update([
                'image' => json_encode($uploadedFiles)
            ]);
        }

        return redirect()->route('userprofile.lists');
    }

    public function delete($id)
    {
        $userProfile = UserProfile::find($id);
       
        $files = json_decode($userProfile->image);
        foreach ($files as $file) {
            Storage::disk('s3')->delete($file);
        }

        $userProfile->delete();
        return redirect()->route('userprofile.lists');
    }
}
