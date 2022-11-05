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
		return view('contents.backend.book_order');
	}
}