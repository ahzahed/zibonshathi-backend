<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AddUserByAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function adduser_byadmin(){
        if (Auth::user()->user_type == 1) {
            return view('backend.adduser_byadmin');
        }
    }
    public function adduser_byadmin_store(Request $request){
        if (Auth::user()->user_type == 1) {
            $post = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'user_type' => ['required'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
            $post = new User();
            $post->name = $request->name;
            $post->email = $request->email;
            $post->user_type = $request->user_type;

            $post->password = Hash::make($request->password);

            $post->save();
            session()->flash('success','Successsfully user created');
            return Redirect()->route('userrole');
        }
        return Redirect()->route('home');
    }

    public function userrole(){
        $registeredUser = User::all();
        if (Auth::user()->user_type == 1) {
            return view('backend.view_userrole', compact('registeredUser'));
        }
        return Redirect()->route('home');
    }
    public function userroleDelete($id)
    {
        if (Auth::user()->user_type == 1) {
            $user = User::find($id);
            $avatar = $user->avatar;
            if ($avatar) {
                unlink($avatar);
            }
            $user->delete();
            session()->flash('danger', 'User successsfully deleted');
            return Redirect()->back();
        }
        return Redirect()->route('home');
    }
}
