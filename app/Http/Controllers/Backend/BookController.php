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
		$data = DB::table('book as bo')
		->join('book_category as bct','bct.id','=','bo.category_id')
		->select('bct.name as category','bo.*')
		->orderBy('bo.created_at','DESC')
		->get();
		$category = DB::table('book_category')->orderBy('created_at','DESC')->get();
		return view('contents.backend.book_list',compact('data','category'));
	}

	public function store(Request $request)
	{
		$image = 'none.jpg';
		if($request->file('image') != null)
		{
			$image = $this->uploadFile($request,'image');
		}
		DB::table('book')->insert([
			'name'=>$request->name,
			'category_id'=>$request->category_id,
			'price'=>$request->price,
			'image'=>$image,
			'created_at'=>Carbon::now('Asia/Jakarta')->toDateTimeString()
		]);
		return redirect()->back()->with('success','Berhasil menambahkan buku');
	}

	public function update(Request $request,$id)
	{
		$image = $request->old_image;
		if($request->file('image') != null)
		{
			$image = $this->uploadFile($request,'image');
		}
		DB::table('book')->where('id',$id)->update([
			'name'=>$request->name,
			'category_id'=>$request->category_id,
			'price'=>$request->price,
			'image'=>$image,
			'updated_at'=>Carbon::now('Asia/Jakarta')->toDateTimeString()
		]);
		return redirect()->back()->with('success','Berhasil mengubah buku');
	}

	public function delete($id)
	{
		DB::table('book')->where('id',$id)->delete();
		return redirect()->back()->with('success','Berhasil menghapus buku');
	}

	public function uploadFile(Request $request,$oke)
    {
            $result ='';
            $file = $request->file($oke);
            $name = $file->getClientOriginalName();
            // $tmp_name = $file['tmp_name'];
            $extension = explode('.',$name);
            $extension = strtolower(end($extension));
            $key = rand().'_'.$oke;
            $tmp_file_name = "{$key}.{$extension}";
            $tmp_file_path = "admin/images/";
            $file->move($tmp_file_path,$tmp_file_name);
            $result = $tmp_file_name;
        return url('admin/images').'/'.$result;
    }
}