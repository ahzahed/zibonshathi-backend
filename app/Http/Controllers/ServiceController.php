<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ServiceController extends Controller
{
    public function index(){
        if (Auth::user()->user_type == 1) {
            $service = Service::all();
            return view('backend.service.service',compact('service'));
        }
        return Redirect()->route('home');
    }
    public function serviceAdd(){
        if (Auth::user()->user_type == 1) {
            return view('backend.service.service_add');
        }
        return Redirect()->route('home');
    }
    public function serviceStore(Request $request){
        if (Auth::user()->user_type == 1) {
            $post = $request->validate([
                'icon' => ['required', 'min:7', 'max:25'],
                'title' => ['required', 'max:24'],
                'description' => ['required', 'max:35','min:10'],
            ]);
            $post = new Service();
            $post->icon = $request->icon;
            $post->title = $request->title;
            $post->description = $request->description;
            $post->save();
            session()->flash('success','Successsfully service added');
            return Redirect()->route('service');
        }
        return Redirect()->route('home');
    }
    public function serviceDelete($id){
        if (Auth::user()->user_type == 1) {
            $service = Service::where('id',$id)->delete();
            session()->flash('danger','Successsfully service deleted');
            return back();
        }
        return Redirect()->route('home');
    }
    public function serviceEdit($id){
        if (Auth::user()->user_type == 1) {
            $service = Service::findorfail($id);
            return view('backend.service.service_edit',compact('service'));
        }
        return Redirect()->route('home');
    }
    public function serviceView($id){
        if (Auth::user()->user_type == 1) {
            $service = Service::findorfail($id);
            return view('backend.service.service_show',compact('service'));
        }
        return Redirect()->route('home');
    }
    public function serviceUpdate(Request $request,$id){
        if (Auth::user()->user_type == 1) {
            $post = Service::findorfail($id);
            $post->icon = $request->icon;
            $post->title = $request->title;
            $post->description = $request->description;
            $post->save();
            session()->flash('success','Successsfully service edited');
            return Redirect()->route('service');
        }
        return Redirect()->route('home');
    }

    function active($id){
        if (Auth::user()->user_type == 1) {
            $changeValue = Service::where('id',$id)->update(['status'=>1]);
            session()->flash('success','Successsfully service activated');
            return back();
        }
        return Redirect()->route('home');
    }
    function deactive($id){
        if (Auth::user()->user_type == 1) {
            $changeValue = Service::where('id',$id)->update(['status'=>0]);
            session()->flash('danger','Successsfully service deactivated');
            return back();
        }
        return Redirect()->route('home');
    }
}
