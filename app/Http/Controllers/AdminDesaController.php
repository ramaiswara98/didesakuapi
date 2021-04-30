<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminDesa;
use App\Http\Resources\AdminDesa as AdminDesaResources;
use App\Http\Resources\AdminDesaCollection;
use Illuminate\Support\Facades\Hash;
class AdminDesaController extends Controller
{   

    //show all AdminDesa Data
    public function index(){
        $adminDesa = AdminDesa::all();
        return new AdminDesaCollection($adminDesa);
    }

    //Store data using post and put method
    public function store(Request $request){
        $adminDesa = $request->isMethod('put') ? AdminDesa::where(['id_desa'=>$request->input('id_desa')])->firstOrFail() : new AdminDesa();
        $adminDesa->username = $request->input('username');
        $adminDesa->password = Hash::make($request->input('password'));
        $adminDesa->nama_desa = $request->input('nama_desa');
        $adminDesa->kode_desa = $request->input('kode_desa');
        $adminDesa->nama_kecamatan = $request->input('nama_kecamatan');
        $adminDesa->kode_kecamatan = $request->input('kode_kecamatan');
        $adminDesa->nama_kabupaten = $request->input('nama_kabupaten');
        $adminDesa->kode_kabupaten = $request->input('kode_kabupaten');
        $adminDesa->nama_provinsi = $request->input('nama_provinsi');
        $adminDesa->kode_provinsi = $request->input('kode_provinsi');
        $adminDesa->alamat_desa = $request->input('alamat_desa');
        $adminDesa->email_desa = $request->input('email_desa');
        $adminDesa->no_hp_desa = $request->input('no_hp_desa');
        if($adminDesa->save()){
            return new AdminDesaResources($adminDesa);
        }else{
            return ['data'=>'Terjadi Keaslahan'];
        }
    }

    public function select($id_desa){
        $adminDesa = AdminDesa::where(['id_desa'=>$id_desa])->count();
        if($adminDesa>0){
            $adminDesa = AdminDesa::where(['id_desa'=>$id_desa])->firstOrFail();
            return new AdminDesaResources($adminDesa);
        }else{
            return ['data'=>null];
        }
    }

    public function delete($id_desa){
        $adminDesa = AdminDesa::where(['id_desa'=>$id_desa])->count();
        if($adminDesa>0){
            $adminDesa = AdminDesa::where(['id_desa'=>$id_desa]);
            $adminDesa->delete();
            return ['data'=>"Succesfully delete desa"];
        }else{
            return ['data'=>null]; 
        }
    }

    public function login(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');
        $adminDesa = AdminDesa::where(['username'=>$username])->count();
        if($adminDesa>0){
            $adminDesa = AdminDesa::where(['username'=>$username])->firstOrFail();
            if(Hash::check($password, $adminDesa->password)){
                return new AdminDesaResources($adminDesa);
            }else{
                return ['data'=>10];
            }
        }else{
            return ['data'=>0];
        }
    }
}
