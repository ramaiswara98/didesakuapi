<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PerangkatDesa;
use App\Http\Resources\PerangkatDesa as PerangkatDesaResources;
use App\Http\Resources\PerangkatDesaCollection;
use Illuminate\Support\Facades\Hash;
class PerangkatDesaController extends Controller
{
    public function index(){
        $perangkatDesa = PerangkatDesa::all();
        return new PerangkatDesaCollection($perangkatDesa);
    }
    public function store(Request $request){
        $perangkatDesa = $request->isMethod('put') ? PerangkatDesa::where(['id_perangkat_desa'=>$request->input('id_perangkat_desa')])->firstOrFail():new PerangkatDesa();
        $perangkatDesa->id_desa = $request->input('id_desa');
        $perangkatDesa->nama_perangkat_desa = $request->input('nama_perangkat_desa');
        $perangkatDesa->nip_perangkat_desa = $request->input('nip_perangkat_desa');
        $perangkatDesa->jabatan_perangkat_desa = $request->input('jabatan_perangkat_desa');
        $perangkatDesa->no_hp_perangkat_desa = $request->input('no_hp_perangkat_desa');
        $perangkatDesa->password = Hash::make($request->input('password'));
        $perangkatDesa->foto_perangkat_desa = $request->input('foto_perangkat_desa');
        if($perangkatDesa->save()){
            return new PerangkatDesaResources($perangkatDesa);
        }else{
            return ['data'=>null];
        }
    }
    public function select($id_perangkat_desa){
        $perangkatDesa = PerangkatDesa::where(['id_perangkat_desa'=>$id_perangkat_desa])->count();
        if($perangkatDesa>0){
            $perangkatDesa = PerangkatDesa::where(['id_perangkat_desa'=>$id_perangkat_desa])->firstOrFail();
            return new PerangkatDesaResources($perangkatDesa);
        }else{
            return ['data'=>null];
        }
    }

    public function delete($id_perangkat_desa){
        $perangkatDesa = PerangkatDesa::where(['id_perangkat_desa'=>$id_perangkat_desa])->count();
        if($perangkatDesa>0){
            $perangkatDesa = PerangkatDesa::where(['id_perangkat_desa'=>$id_perangkat_desa]);
            if($perangkatDesa->delete()){
                return ['data'=>'Succesfully delete perangkat desa'];
            }else{
                ['data'=>'null'];
            }
        }else{
            return ['data'=>null];
        }
    }

    public function login(Request $request){
        $nohp = $request->input('no_hp_perangkat_desa');
        $password = $request->input('password');
        $perangkatDesa = PerangkatDesa::where(['no_hp_perangkat_desa'=>$nohp])->count();
        if($perangkatDesa > 0){
            $perangkatDesa = PerangkatDesa::where(['no_hp_perangkat_desa'=>$nohp])->firstOrFail();
            if(Hash::check($password, $perangkatDesa->password)){
                return new PerangkatDesaResources($perangkatDesa);
            }else{
                return ['data',10];
            }
        }else{
            return ['data'=>0];
        }
    }
}
