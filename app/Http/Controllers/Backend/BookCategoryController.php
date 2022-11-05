<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller as CoreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Carbon\Carbon;
class BookCatgeoryController extends CoreController
{
	public function __construct()
   {
       $this->middleware('auth');
   }
   
	public function index()
	{
		$data = DB::table('book_category')->orderBy('created_at','DESC')->get();
		return view('contents.backend.book_category',compact('data'));
	}

	public function store(Request $request)
	{
		DB::table('book_category')->insert([
			'name'=>$request->name,
			'created_at'=>Carbon::now('Asia/Jakarta')->toDateTimeString();
		]);
		return redirect()->back()->with('success','Berhasil menambahkan kategori');
	}

	public function update(Request $request,$id)
	{
		DB::table('book_category')->where('id',$id)->update([
			'name'=>$request->name,
			'updated_at'=>Carbon::now('Asia/Jakarta')->toDateTimeString();
		]);
		return redirect()->back()->with('success','Berhasil menambahkan kategori');
	}

	public function delete($id)
	{
		DB::table('book_category')->where('id',$id)->delete();
		return redirect()->back()->with('success','Berhasil menghapus kategori');
	}
}