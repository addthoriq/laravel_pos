<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;
use DataTables;
use Form;

class CategoryController extends Controller
{
    protected $folder = 'admin.product.category';
    protected $rdr = 'admin/category';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data   = Category::all();
        return view($this->folder.'.index', compact('data'));
    }

    public function table(Request $request)
    {
        $data  = Category::select(['id', 'name', 'created_at']);
        return Datatables::of($data)
        ->editColumn('created_at', function($index){
            return $index->created_at->format('d F Y');
        })
        ->addColumn('action', function($index){
            $tag = '<form action="'.route('category.destroy',$index->id).'" method="post"><a class="btn btn-success btn-sm" data-toggle="modal" data-target="#'.$index->id.'"><i class="fa fa-chevron-circle-right"></i></a> '.csrf_field().method_field("DELETE").'<button type="submit" class="btn btn-danger btn-sm" onclick="javascript:return confirm("Apakah anda yakin ingin menghapus data ini?")"><i class="fa fa-trash"></i></button></form>';
            return $tag;
        })
        ->rawColumns(['id','action'])
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->folder.'.create');
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
            'name'  => 'required'
        ]);
        $data   = new Category;
        $data->name   = $request->name;
        $data->save();
        return redirect($this->rdr)->with('success', 'Data Berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Category::find($id);
        return view($this->folder.'.edit', compact('data'));
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
        $this->validate($request,[
            'name'  => 'required'
        ]);
        Category::find($id)->update([
            'name'  => $request->name
        ]);
        return redirect($this->rdr)->with('success', 'Data Berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Category::find($id);
        $data->delete();
        return redirect($this->rdr)->with('success', 'Data Berhasil di Hapus');
    }
}
