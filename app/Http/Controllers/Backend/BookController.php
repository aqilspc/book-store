<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller as CoreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Carbon\Carbon;
class BookController extends CoreController
{
	public function __construct()
   {
       $this->middleware('auth');
   }
   
	public function index()
	{
		return view('contents.backend.book_list');
	}

	public function store(Request $request)
	{
		DB::table('book')->insert([
			'name'=>$request->name,
			'created_at'=>Carbon::now('Asia/Jakarta')->toDateTimeString();
		]);
		return redirect()->back()->with('success','Berhasil menambahkan buku');
	}

	public function update(Request $request,$id)
	{
		DB::table('book')->where('id',$id)->update([
			'name'=>$request->name,
			'updated_at'=>Carbon::now('Asia/Jakarta')->toDateTimeString();
		]);
		return redirect()->back()->with('success','Berhasil menambahkan buku');
	}

	public function delete($id)
	{
		DB::table('book')->where('id',$id)->delete();
		return redirect()->back()->with('success','Berhasil menghapus buku');
	}
}