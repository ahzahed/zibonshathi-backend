<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\AssignOp\Concat;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->user_type == 1) {
            $contact = Contact::all();
            return view('backend.contact',compact('contact'));
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contact = $request->validate([
            'fname' => ['required', 'max:25'],
            'lname' => ['required', 'max:15'],
            'email' => ['required', 'max:25','min:4'],
            'message' => ['required', 'max:500','min:10'],
        ]);

        $contact = new Contact;
        $contact->fname=$request->fname;
        $contact->lname=$request->lname;
        $contact->message=$request->message;
        $contact->email=$request->email;
        $contact->save();
        session()->flash('success','Successsfully messege sent');
        return Redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->user_type == 1 || Auth::user()->user_type == 2) {
            $contact=Contact::find($id);
            $contact->delete();
            session()->flash('danger','Successsfully message deleted');
            return Redirect()->back();
        }
        return Redirect()->route('home');
    }
}
