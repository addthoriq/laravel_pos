<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $folder   = 'admin.user';
    protected $rdr   = 'admin/user';
    public function index()
    {
        $data = User::orderBy('id')->paginate(10);
        return view($this->folder.'.index',compact('data'));
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
        $data = new User;
        $data->name     = $request->name;
        $data->email     = $request->email;
        $data->password     = bcrypt($request->password);
        $data->save();
        auth()->login($data);
        return redirect('admin/')->with('success', 'Selamat Datang di Sistem Admin Sarkop v.0.0.1');
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
        $data   = User::find($id);
        return view($this->folder.'.edit',compact('data'));
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
            'name'  => 'required',
            'email'  => 'required|email|unique:users,email',
            'password'  => 'required',
        ]);
        $datas = $request->all();
        if (empty($datas['password'])) {
            unset($datas['password']);
            $this->validate($request,[
                'name'  => 'required',
                'email'  => 'required|email|unique:users,email',
            ]);
        }else{
            $this->validate($request,[
                'name'  => 'required',
                'email'  => 'required|email|unique:users,email',
                'password'  => 'required',
            ]);
        }
            User::find($id)->update([
                'name'  => $request->name,
                'email'  => $request->email,
                'password'  => bcrypt($request->password),
            ]);
        return redirect($this->rdr)->with('success', 'Data berhasil di rubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect($this->rdr);
    }
}
