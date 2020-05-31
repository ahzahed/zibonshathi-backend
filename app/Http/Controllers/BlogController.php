<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if (Auth::user()->user_type == 1) {
            $blog = Blog::all();
            return view('backend.blog.blog',compact('blog'));
        }
        return Redirect()->route('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->user_type == 1) {
            return view('backend.blog.blogAdd');
        }
        return Redirect()->route('home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->user_type == 1) {
            $validatedData = $request->validate([
                'image' => ['required', 'image', 'mimes:png,jpg,jpeg,bmp,svg','max:5000'],
                'title' => ['required'],
                'description' => ['required'],
            ]);

            $blog = new Blog;
            $imageUpload = request()->file('image');
            $imageName = time().'.'.$imageUpload->getClientOriginalExtension();
            $imagePath = public_path('/backend/images/blog');
            $imageUpload->move($imagePath, $imageName);

            // 'avatar' => 'public/Frontend/images/male/'.$avatarName,
            $blog->image='public/backend/images/blog/'.$imageName;
            $blog->title=$request->title;
            $blog->description=$request->description;
            $blog->save();
            $blog = Blog::all();
            return view('backend.blog.blog',compact('blog'));
            // return Redirect()->back();
        }
        return Redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::user()->user_type == 1) {
            $blog=Blog::findorfail($id);
            return view('backend.blog.blogShow',compact('blog'));
        }
        return Redirect()->route('home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->user_type == 1) {
            $blog = Blog::findorfail($id);
            return view('backend.blog.blogEdit',compact('blog'));
        }
        return Redirect()->route('home');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::user()->user_type == 1) {
            if(request()->has('image')){
                $blog = Blog::findorfail($id);
                $imageUpload = request()->file('image');
                $imageName = time().'.'.$imageUpload->getClientOriginalExtension();
                $imagePath = public_path('/backend/images/blog');
                $imageUpload->move($imagePath, $imageName);
                $image = $blog->image;
                unlink($image);

                // 'avatar' => 'public/Frontend/images/male/'.$avatarName,
                $blog->image='public/backend/images/blog/'.$imageName;
                $blog->title=$request->title;
                $blog->description=$request->description;
                $blog->save();
                $blog = Blog::all();
                return view('backend.blog.blog',compact('blog'));
            }
            $blog = Blog::findorfail($id);
            $blog->title=$request->title;
            $blog->description=$request->description;
            $blog->save();
            $blog = Blog::all();
            return view('backend.blog.blog',compact('blog'));
        }
        return Redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->user_type == 1) {
            $blog=Blog::find($id);
            $image = $blog->image;
            unlink($image);
            $blog->delete();
            return Redirect()->back();
        }
        return Redirect()->route('home');
    }

    public function addBlog(){
        if (Auth::user()->user_type == 1) {
            return view('backend.blog/blogAdd');
        }
        return Redirect()->route('home');
    }
    public function allBlog(){
        if (Auth::user()->user_type == 1) {
            $blog=Blog::all();
            return view('frontend.pages.blog',compact('blog'));
        }
        return Redirect()->route('home');
    }

    function active($id){
        if (Auth::user()->user_type == 1) {
            $changeValue = Blog::where('id',$id)->update(['status'=>1]);
            return back();
        }
        return Redirect()->route('home');
    }
    function deactive($id){
        if (Auth::user()->user_type == 1) {
            $changeValue = Blog::where('id',$id)->update(['status'=>0]);
            return back();
        }
        return Redirect()->route('home');
    }
}
