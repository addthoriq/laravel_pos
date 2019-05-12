<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\Order;
use App\Model\OrderDetail;
use App\Model\User;
use App\Model\Product;
use App\Model\Category;

class HomeController extends Controller
{
    public function index()
    {
    	$pro 	= DB::table('products')->where('status', 1)->whereNull('deleted_at')->get();
    	$pay 	= DB::table('payments')->where('status', 1)->get();
    	$ord 	= Order::all();
    	$usr 	= User::all();
    	$cat 	= Category::all();
    	return view('admin.index', compact('ord','usr','pro','cat', 'pay'));
    }
}
