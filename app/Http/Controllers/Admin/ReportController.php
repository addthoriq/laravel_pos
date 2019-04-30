<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Model\Order;
use App\Model\User;
use App\Exports\OrdersExport;
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
    public function download(Request $request)
    {
        $tipe   = $request->get('tipe');
        if ($tipe == null) {
            return redirect()->back()->with('failed', 'Data tidak ada');
        }elseif ($tipe == 1) {
            return $this->pdf($request);
        }else{
            return $this->excel($request);
        }
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
        $htg    = count($data);
        if ($htg > 0) {
        	$pdf 	= PDF::loadView('admin.report.pdf', $data, compact('data'));	
        	return $pdf->download('report.pdf');
        }
        else{
            return redirect()->back()->with('failed', 'Data tidak ada');
        }
    }
    public function excel(Request $request)
    {
        $yr     = $request->get('tahun');
        $mt     = $request->get('bulan');
        $us     = $request->get('kasir');

        $users  = User::all();
        $data   = new Order();
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
        $htg  = count($data);
        if ($htg > 0) {
            return Excel::download(new OrdersExport($yr, $mt, $us), 'report.xlsx');
        }else{
            return redirect()->back()->with('failed', 'Data tidak ada');
        }
    }
}
