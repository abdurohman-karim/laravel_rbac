<?php

namespace App\Http\Controllers\Blade\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    public function index(){
        return view('pages.profile.index');
    }
    public function store(Request $request){
        $user = User::find(auth()->user()->id);
        $id = $user->id;
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        if($request->has('photo_profile')){
            $old_image = $user->photo_profile;
            if(!$old_image==null){
                unlink(public_path('images/'.$old_image));
            }
            $path = time().'.'.$request->photo_profile->extension();

            // Public Folder
            $request->photo_profile->move(public_path('images'), $path);
            $user->photo_profile = $path;
        }

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if($request->password){
            $user->password = Hash::make($request->input('password'));
        }
        $user->save();

        return redirect()->route('profile')->with('success','Muvofiqiyatli tahrirlandi!');
    }
}
