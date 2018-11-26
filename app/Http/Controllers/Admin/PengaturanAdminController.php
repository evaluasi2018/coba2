<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use App\Admin\PengaturanAdmin;
use DB;
use Auth;

class PengaturanAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
   public function index()
    {
        return view('admin/manajemen_pengaturan_admin.index');
    }

    public function store(Request $request)
    {
        $data = [
            'nm_admin'  =>  $request['nm_admin'],
            'username'  =>  $request['username'],
            'password'  =>  bcrypt($request['password-admin']),
        ];
        // dd($data);
        $berhasil =  PengaturanAdmin::create($data);
        if ($berhasil) {
            return redirect()->route('manajemen.admin');
        }
    }

    public function edit($id_admin)
    {
        $admin = PengaturanAdmin::find($id_admin);
        return $admin;
    }

    public function update(Request $request, $id_admin)
    {
        $admin = PengaturanAdmin::find($id_admin);
        $admin->nm_admin = $request['nm_admin'];
        $admin->username = $request['username'];
        if($request['password-admin'] == $request['ulangi-password-admin']){
            $admin->password = $request['ulangi-password-admin'];
            // dd($admin);
        $admin->save();
        return $admin;
        }else{
            return "<script>alert('Password Tidak Sama !');</script>";
        }

    }

    public function destroy($id_admin)
    {
        PengaturanAdmin::where('id_admin',$id_admin)->forceDelete();
    }
    public function apiPengaturanAdmin()
    {
        DB::statement(DB::raw('set @rownum=0'));
        $data_admin = DB::table('tb_admin')
                ->select('id_admin','nm_admin','username',DB::raw('@rownum  := @rownum  + 1 AS rownum'))
                ->whereNull('deleted_at')
                ->get();
        return Datatables::of($data_admin)
            ->editColumn('action',function($data_admin){
                return ($data_admin->id_admin == Auth::guard('admin')->user()->id_admin) ? '<a onclick="editAdmin('.$data_admin->id_admin.')" class="btn btn-success btn-xs btn-flat"><i class="glyphicon glyphicon-edit btn-xs"></i></a> '. trans(''): 
                    '<a onclick="hapusAdmin('.$data_admin->id_admin.')" class="btn btn-danger btn-xs btn-flat"><i class="glyphicon glyphicon-trash btn-xs"></i></a> ';
                

                    
            })->make(true);
    }
}
