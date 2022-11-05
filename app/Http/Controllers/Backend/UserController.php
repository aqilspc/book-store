<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller as CoreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
class UserController extends CoreController
{
	public function __construct()
   {
       $this->middleware('auth');
   }
   
	public function index()
	{
		$data = DB::table('users')->where('role','member')->orderBy('created_at','DESC')->get();
		return view('contents.backend.users',compact('data'));
	}
}