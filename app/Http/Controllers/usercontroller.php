<?php

namespace App\Http\Controllers;

use App\Models\usermod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    public function getuser()
    {
        $dt_user=usermod ::get();
        return response()->json($dt_user);
    }

    public function adduser(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'nama_pelanggan' => 'required',
            'tanggal_lahir' => 'required',
            'gender' => 'required',
            'alamat' => 'required',
            'username' => 'required',
            'password' => 'required',
            'level' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson());
        }
        $save = usermod::create([
            'nama_pelanggan'  => $req->get('nama_pelanggan'),
            'tanggal_lahir' => $req->get('tanggal_lahir'),
            'gender'  => $req->get('gender'),
            'alamat' => $req->get('alamat'),
            'username'  => $req->get('username'),
            'password' => $req->get('password'),
            'level' => $req->get('level')
        ]);
        if ($save) {
            return response()->json(['status' => true, 'message' => 'berhasil menambahkan user']);
        } else {
            return response()->json(['status' => false, 'message' => 'gagal menambahkan user']);
    }
    }
    public function updateuser(Request $req,$id)
    {
        $validator = Validator::make($req->all(), [
            'nama_pelanggan' => 'required',
            'tanggal_lahir' => 'required',
            'gender' => 'required',
            'alamat' => 'required',
            'username' => 'required',
            'password' => 'required',
            'level' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson());
        }
        $ubah = usermod::where('id_user',$id)->update([ 
            'nama_pelanggan'  => $req->get('nama_pelanggan'),
            'tanggal_lahir' => $req->get('tanggal_lahir'),
            'gender'  => $req->get('gender'),
            'alamat' => $req->get('alamat'),
            'username'  => $req->get('username'),
            'password' => $req->get('password'),
            'level' => $req->get('level')
        ]);
        if ($ubah) {
            return response()->json(['status' => true, 'message' => 'berhasil mengedit user']);
        } else {
            return response()->json(['status' => false, 'message' => 'gagal mengedit user']);
    }
    }
    public function deleteuser($id)
    {
        $hapus = usermod::where('id_user',$id)->delete();
        if ($hapus) {
            return response()->json(['status' => true, 'message' => 'berhasil menghapus user']);
        } else {
            return response()->json(['status' => false, 'message' => 'gagal menghapus user']);
    }
    }
    public function getuserid($id)
    {
        $dt = usermod::where('id_user',$id)->first();
        return Response()->json($dt);
    }
}