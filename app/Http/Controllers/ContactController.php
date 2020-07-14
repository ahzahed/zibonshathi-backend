<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Mail\ReplyMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Expr\AssignOp\Concat;

class ContactController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->user_type == 1) {
            $contact = Contact::all();
            return view('backend.contact', compact('contact'));
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
            'email' => ['required', 'max:25', 'min:4'],
            'message' => ['required', 'max:500', 'min:10'],
        ]);

        $contact = new Contact;
        $contact->fname = $request->fname;
        $contact->lname = $request->lname;
        $contact->message = $request->message;
        $contact->email = $request->email;
        $contact->save();
        session()->flash('success', 'Successsfully messege sent');
        return Redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::user()->user_type == 1 || Auth::user()->user_type == 2) {
            $contact = Contact::findorfail($id);
            return view('backend.admin_contact_view', compact('contact'));
        }
        return Redirect()->route('home');
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
            $contact = Contact::find($id);
            $contact->delete();
            session()->flash('danger', 'Successsfully message deleted');
            return Redirect()->back();
        }
        return Redirect()->route('home');
    }

    public function replypeople(Request $request, $id)
    {
        $contact = Contact::findorfail($id);
        $email = $contact->email;
        $reply = $request->replypeople;
        Mail::to($email)->send(new ReplyMail($reply));
        return Redirect()->back();
    }
}
