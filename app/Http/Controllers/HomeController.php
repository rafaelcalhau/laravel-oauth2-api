<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentToken = \App\AccessToken::where('user_id', Auth::user()->id)->select('name')->first();
        $secret = \App\Client::whereId(2)->select('secret')->first();
        
        return view('home', [
            'currentToken' => $currentToken !== null ? $currentToken->name : "",
            'secret' => $secret !== null ? $secret->secret : ""
        ]);
    }
}
