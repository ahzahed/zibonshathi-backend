<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\VisitorModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VisitorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function visitorIndex()
    {
        if (Auth::user()->user_type == 1 || Auth::user()->user_type == 2) {
            // $visitorData = VisitorModel::orderBy('id','desc')->take(3)->get();
            $visitorData = VisitorModel::orderBy('id','desc')->get();
            return view('backend/visitor', compact('visitorData'));
        }
        return Redirect()->route('home');
    }
}
