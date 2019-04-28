<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Order;
use App\Model\Payment;
use App\Model\OrderDetail;
use App\Model\Product;

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
        $pro    = Product::where('deleted_at', null)->restore();
        $data   = Order::paginate(10);
        return view($this->folder.'.index', compact('data', 'pro'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data  = Payment::all();
        $ord   = OrderDetail::all();
        $pro   = Product::all();
        return view($this->folder.'.create', compact('data','ord','pro'));
        }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'table_number'  => 'required',
        //     'pesanan'  => 'required',
        //     'jumlah'  => 'required',
        //     'note'  => 'required',
        //     'payment'  => 'required',
        //     'user'  => 'required',
        // ]);
        $product    = Product::find($request->pesanan);
        $count  = count($request->pesanan);
        $item   = $request->pesanan;
        $qty    = $request->jumlah;
        $note   = $request->note;
        $sub    = $request->subtotal;
        $total  = $request->total;
        $request->merge([
            'created_by'   => auth()->user()->id,
        ]);
        $order  = $request->only('table_number', 'payment_id', 'created_by');
        $orderData = Order::create($order);

        for ($i=0; $i < $count; $i++) { 
            $request->merge([
                'order_id'  => $orderData->id,
                'product_id' => $item[$i],
                'quantity'  => $qty[$i],
                'note'      => $note[$i],
                'subtotal'  => $sub[$i],
            ]);
            $orderDetail    = $request->only('order_id','product_id','quantity','note', 'subtotal');
            OrderDetail::create($orderDetail);
        }
        Order::find($orderData->id)->update([
            'total' => $total,
        ]);

        return redirect($this->rdr)->with('success', 'Data berhasil ditambahkan');
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
        $pay    = Payment::all();
        $data   = Order::find($id);
        $pro    = Product::all();
        $ord    = OrderDetail::find($id);
        return view($this->folder.'.edit', compact('data','pay','pro','ord'));    
    }

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
            'pesanan'  => 'required',
            'jumlah'  => 'required',
            'payment'  => 'required',
            'note'  => 'required',
            'user'  => 'required',
        ]);
        $data1   = Order::where('id', $id)->first();
        $data1->table_number = $request->table_number;
        $data1->payment_id = $request->payment;
        $data1->created_by = $request->user;
        $data1->save();

        $data2  = OrderDetail::where('id',$id)->first();
        $data2->order_id = $data1->id;
        $data2->product_id = $request->pesanan;
        $data2->quantity = $request->jumlah;
        $data2->note = $request->note;
        $data2->save();

        $dat = Order::find($data1->id);
        $dat->total = $data2->product->price*$request->jumlah;
        $dat->save();
        return redirect($this->rdr)->with('success', 'Data berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Order::find($id);
        $data->delete();
        return redirect($this->rdr)->with('success', 'Data berhasil dihapus');
    }
}
