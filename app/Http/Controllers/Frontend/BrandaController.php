<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller as CoreController;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Auth;
use Session;
class BrandaController extends CoreController
{
	public function index()
	{
		$data = DB::table('book as bo')
		->join('book_category as bct','bct.id','=','bo.category_id')
		->select('bct.name as category','bo.*')
		->orderBy('bo.created_at','DESC')
		->limit(3)
		->get();
		$banyak = count($data) - 1;
		return view('contents.frontend.branda',compact('data','banyak'));
	}

	public function book(Request $request)
	{
		$get = DB::table('book as bo');
		$get ->join('book_category as bct','bct.id','=','bo.category_id');
		if($request->search)
		{
			$get->where('bo.name', 'like', '%' . $request->search . '%');
			$get->orWhere('bct.name', 'like', '%' . $request->search . '%');
		}
		$get ->select('bct.name as category','bo.*');
		$get ->orderBy('bo.created_at','DESC');
		$data = $get->get();
		$banyak = count($data) - 1;
		return view('contents.frontend.book',compact('data','banyak','request'));
	}

	public function addTocart($id)
	{
		$banyak = 0;
		if(Auth::check())
		{
			DB::table('book_order_cart')->insert([
				'book_id'=>$id,
				'user_id'=>Auth::user()->id,
				'status'=>'not',
				'created_at'=>Carbon::now('Asia/Jakarta')->toDateTimeString(),
				'updated_at'=>Carbon::now('Asia/Jakarta')->toDateTimeString()
			]);
			$banyak = DB::table('book_order_cart')->where('user_id',Auth::user()->id)->where('status','not')->count();
			Session::put('item',$banyak);
		}else{
			Session::put('item',$banyak);
		}
		return response()->json($banyak);
	}
}