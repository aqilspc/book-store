<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller as CoreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Carbon\Carbon;
class BookOrderController extends CoreController
{
	public function __construct()
   {
       $this->middleware('auth');
   }
   
	public function index()
	{
		$data = DB::table('book_order as bor')
		->join('users as us','us.id','=','bor.user_id')
		->select('us.name','bor.*')
		->get();
		return view('contents.backend.book_order',compact('data'));
	}

	public function update(Request $request,$id)
	{
		$status = $request->status;
		DB::table('book_order')->where('id',$id)->update(['status'=>$status]);
		return redirect()->back()->with('success','Berhasil mengubah status order');
	}
}