<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Session;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->role == 'admin')
        {
            return redirect('backend_dashboard');
        }else{
            $banyak = DB::table('book_order_cart')->where('user_id',Auth::user()->id)->where('status','not')->count();
            Session::put('item',$banyak);
            return redirect('hompage_branda');
        }
       // return view('home');
    }
}
