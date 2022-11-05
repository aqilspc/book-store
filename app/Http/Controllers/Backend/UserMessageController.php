<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller as CoreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
class UserMessageController extends CoreController
{
	public function __construct()
   {
       $this->middleware('auth');
   }
   
	public function index()
	{
		$data = DB::table('user_message as usm')
				->join('users as us','us.id','=','usm.user_id')
				->select('us.email','usm.*')
				->get();
		return view('contents.backend.user_message',compact('data'));
	}
}