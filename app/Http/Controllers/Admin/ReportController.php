<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Exports\ReportsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Model\Order;
use App\Model\User;
use PDF;

class ReportController extends Controller
{
    public function index(Request $request)
    {
    	$yr 	= $request->get('tahun');
    	$mt 	= $request->get('bulan');
    	$us 	= $request->get('kasir');

    	$users	= User::all();
    	$data 	= new Order();

    	if ($yr) {
    		$data = $data->whereYear('created_at', $yr);
    	}
    	if ($mt) {
    		$data = $data->whereMonth('created_at', $mt);
    	}
    	if ($us) {
    		$data = $data->where('created_by', $us);
    	}
    	$data = $data->paginate(10);

    	return view('admin.report.index', compact('data','users'));
    }
    public function pdf(Request $request)
    {
    	$yr 	= $request->get('tahun');
    	$mt 	= $request->get('bulan');
    	$us 	= $request->get('kasir');

    	$users	= User::all();
    	$data 	= new Order();
    	if ($yr) {
    		$data = $data->whereYear('created_at', $yr);
    	}
    	if ($mt) {
    		$data = $data->whereMonth('created_at', $mt);
    	}
    	if ($us) {
    		$data = $data->where('created_by', $us);
    	}
    	$data = $data->get();
    	$pdf 	= PDF::loadView('admin.report.pdf', $data, compact('data'));	
    	return $pdf->download('report.pdf');
    }
    public function excel()
    {
    	return Excel::download(new ReportsExport, 'report.xlsx');
    }
}
