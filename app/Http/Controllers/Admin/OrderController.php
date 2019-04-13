<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Order;
use App\Model\Payment;
use App\Model\User;
use App\Model\OrderDetail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $folder   = 'admin.order';
    protected $rdr      = 'admin/order';
    public function index()
    {
        $data   = Order::orderBy('id')->paginate(5);
        return view($this->folder.'.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data  = Payment::all();
        $usr   = User::all();
        return view($this->folder.'.create', compact('data','usr'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'table_number'  => 'required',
            'total'  => 'required',
            'payment'  => 'required',
            'user'  => 'required',
        ]);
        $data   = new Order;
        $data->table_number = $request->table_number;
        $data->total = $request->total;
        $data->payment_id = $request->payment;
        $data->created_by = $request->user;
        $data->save();
        return redirect($this->rdr);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pay  = Payment::all();
        $usr   = User::all();
        $data   = Order::find($id);
        return view($this->folder.'.edit', compact('data','usr','pay'));    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'table_number'  => 'required',
            'total'  => 'required',
            'payment'  => 'required',
            'user'  => 'required',
        ]);
        Order::find($id)->update([
            'table_number'  => $request->table_number,
            'total'  => $request->total,
            'payment_id'  => $request->payment,
            'created_by'  => $request->user,
        ]);
        return redirect($this->rdr);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
