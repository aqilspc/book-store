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

	public function removeToCart($id)
	{
		$banyak = 0;
		if(Auth::check())
		{
			DB::table('book_order_cart')->where('id',$id)->delete();
			$banyak = DB::table('book_order_cart')->where('user_id',Auth::user()->id)->where('status','not')->count();
			Session::put('item',$banyak);
		}else{
			Session::put('item',$banyak);
		}
		return response()->json($banyak);
	}

	public function getCardItem()
	{
		$arr = DB::table('book_order_cart as boct')
		->join('book as bo','bo.id','=','boct.book_id')
		->join('book_category as bct','bct.id','=','bo.category_id')
		->where('boct.user_id',Auth::user()->id)
		->where('boct.status','not')
		->select('bct.name as category','bo.*','boct.id as cart_id')
		->get();
		//return $arr;
		$banyak = count($arr) - 1;
		$tot = 0;
		foreach ($arr as $key => $value) {
			$tot += $value->price;
		}
		return view('contents.frontend.cart',compact('arr','banyak','tot'));
	}

	public function getCardItemSuccess()
	{
		$arr = DB::table('book_order_cart as boct')
		->join('book as bo','bo.id','=','boct.book_id')
		->join('book_category as bct','bct.id','=','bo.category_id')
		->where('boct.user_id',Auth::user()->id)
		->where('boct.status','not')
		->select('bct.name as category','bo.*','boct.id as cart_id')
		->get();
		//return $arr;
		$banyak = count($arr) - 1;
		$tot = 0;
		foreach ($arr as $key => $value) {
			$tot += $value->price;
		}
		return view('contents.frontend.cart',compact('arr','banyak','tot'));
	}

	public function checkOutAll()
	{
		$arr = DB::table('book_order_cart as boct')
		->join('book as bo','bo.id','=','boct.book_id')
		->join('book_category as bct','bct.id','=','bo.category_id')
		->where('boct.user_id',Auth::user()->id)
		->where('boct.status','not')
		->select('bct.name as category','bo.*','boct.id as cart_id')
		->get();
		$tot = 0;
		foreach ($arr as $key => $value) {
			$tot += $value->price;
		}
		$trs = DB::table('book_order')->insertGetId([
				'user_id'=>Auth::user()->id,
				'grandtotal'=>$tot,
				'status'=>'unpaid',
				'order_id'=>rand(),
				'created_at'=>Carbon::now('Asia/Jakarta')->toDateTimeString(),
				'updated_at'=>Carbon::now('Asia/Jakarta')->toDateTimeString()
			]);
		foreach ($arr as $key => $value) {
			DB::table('book_order_item')->insert([
				'book_order_id'=>$trs,
				'book_id'=>$value->id,
				'subtotal'=>$value->price,
				'created_at'=>Carbon::now('Asia/Jakarta')->toDateTimeString(),
				'updated_at'=>Carbon::now('Asia/Jakarta')->toDateTimeString()
			]);

			DB::table('book_order_cart')->where('id',$value->cart_id)->update(['status'=>'checkout']);
		}
		$banyak = DB::table('book_order_cart')->where('user_id',Auth::user()->id)->where('status','not')->count();
		Session::put('item',$banyak);
		return redirect('hompage_list_user_cart_success')->with('success','Semua buku sudah di checkout, silahkan menhubngi admin untuk melakkuakn / konfirmasi pembayaran!');
	}
}