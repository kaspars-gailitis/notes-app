<?php

namespace App\Http\Controllers;
use App;
use Illuminate\Http\Request;

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
        return view('home');
    }
    public function userLocale($locale){
       App::setLocale($locale);
       if($locale == 'fr') return redirect('/fr');
       if($locale == 'en') return redirect('/fr');
    }
}
