<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warga;
use App\Http\Resources\Warga as WargaResources;
use App\Http\Resources\WargaCollection;
use Illuminate\Support\Facades\Hash;
class WargaController extends Controller
{
    public function index(){
        $warga = Warga::all();
        return new WargaCollection($warga);
    }

    public function store(Request $request){
        $warga = $request->isMethod('put') ? Warga::where(['id_warga'=>$request->input('id_warga')])->firstOrFail() : new Warga();
        $warga->id_desa = $request->input('id_desa');
        $warga->nama_warga = $request->input('nama_warga');
        $warga->no_hp_warga = $request->input('no_hp_warga');
        $warga->tgl_lahir_warga = $request->input('tgl_lahir_warga');
        $warga->alamat_warga = $request->input('alamat_warga');
        $warga->foto_warga = $request->input('foto_warga');
        $warga->password = Hash::make($request->input('password'));

        if($warga->save()){
            return new WargaResources($warga);
        }else{
            return ['data'=>"null"];
        }
    }

    public function select($id_warga){
        $warga = Warga::where(['id_warga'=>$id_warga])->count();
        if($warga > 0){
            $warga = Warga::where(['id_warga'=>$id_warga])->firstOrFail();
            return new WargaResources($warga);
        }else{
            return ['data'=>null];
        }
    }

    public function delete($id_warga){
        $warga = Warga::where(['id_warga'=>$id_warga])->count();
        if($warga > 0){
            $warga = Warga::where(['id_warga'=>$id_warga]);
            if($warga->delete()){
                return ['data'=>'Successfully delete warga'];
            }else{
                return ['data'=>null];
            }
        }else{
            return ['data'=>null];
        }
    }

    public function login (Request $request){
        $nohp = $request->input('no_hp_warga');
        $password = $request->input('password');
        $warga = Warga::where(['no_hp_warga'=>$nohp])->count();
        if($warga>0){
            $warga = Warga::where(['no_hp_warga'=>$nohp])->firstOrFail();
            if(Hash::check($password, $warga->password)){
                return new WargaResources($warga);
            }else{
                return ['data'=>10];
            }
        }else{
            return ['data'=>0];
        }
    }
}
