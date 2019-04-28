<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Product;
use App\Model\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $folder   = 'admin.product.item';
    protected $rdr   = 'admin/item';
    public function index()
    {
        $data   = Product::orderBy('id')->paginate(10);
        return view($this->folder.'.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data   = Category::all();
        return view($this->folder.'.create', compact('data'));
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
            'category'  => 'required',
            'name'  => 'required',
            'price'  => 'required',
            'status'  => 'required',
        ]);
        $data   = new Product;
        $data->category_id  = $request->category;
        $data->name  = $request->name;
        $data->price  = $request->price;
        $data->status  = $request->status;
        $data->save();
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat  = Category::all();
        $data = Product::find($id);
        return view($this->folder.'.edit',compact('data','cat'));
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
            'category'  => 'required',
            'name'  => 'required',
            'price'  => 'required',
            'status'  => 'required',
        ]);
        Product::find($id)->update(
            [
                'category_id'   => $request->category,
                'name'   => $request->name,
                'price'   => $request->price,
                'status'   => $request->status,
            ]
        );
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
        $data   = Product::find($id);
        $data->delete();
        return redirect($this->rdr)->with('success', 'Data berhasil di Hapus');
    }
}
