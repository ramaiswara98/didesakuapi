<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfileDesa;
use App\Http\Resources\ProfileDesa as ProfileDesaResources;
use App\Http\Resources\ProfileDesaCollection;
class ProfileDesaController extends Controller
{
    public function index(){
        $profileDesa = ProfileDesa::all();
        return new ProfileDesaCollection($profileDesa);
    }
    public function store(Request $request){
        $profileDesa = $request->isMethod('put') ? ProfileDesa::where(['id_profile_desa'=>$request->input('id_profile_desa')])->firstOrFail() : new ProfileDesa();
        $profileDesa->id_desa = $request->input('id_desa');
        $profileDesa->sambutan_kepala_desa = $request->input('sambutan_kepala_desa');
        $profileDesa->jumlah_penduduk = $request->input('jumlah_penduduk');
        if($profileDesa->save()){
            return new ProfileDesaResources($profileDesa);
        }else{
            return ['data'=>null];
        }
    }
    public function select($id_profile_desa){
        $profileDesa = ProfileDesa::where(['id_profile_desa'=>$id_profile_desa])->count();
        if($profileDesa>0){
            return new ProfileDesaResources(ProfileDesa::where(['id_profile_desa'=>$id_profile_desa])->firstOrFail());
        }else{
            return ['data'=>null];
        }
    }

    public function selectByDesa($id_desa){
        $profileDesa = ProfileDesa::where(['id_desa'=>$id_desa])->count();
        if($profileDesa>0){
            return new ProfileDesaResources(ProfileDesa::where(['id_desa'=>$id_desa])->firstOrFail());
        }else{
            return ['data'=>null];
        }
    
    }

    public function delete($id_profile_desa){
        $profileDesa = ProfileDesa::where(['id_profile_desa'=>$id_profile_desa])->count();
        if($profileDesa>0){
            $profileDesa = ProfileDesa::where(['id_profile_desa'=>$id_profile_desa]);
            if($profileDesa->delete()){
                return ['data'=>'Succesfullu delete profile desa'];
            }else{
                ['data'=>null];
            }
        }else{
            return ['data'=>null];
        }
    }
    public function deleteByDesa($id_desa){
        $profileDesa = ProfileDesa::where(['id_desa'=>$id_desa])->count();
        if($profileDesa>0){
            $profileDesa = ProfileDesa::where(['id_desa'=>$id_desa]);
            if($profileDesa->delete()){
                return ['data'=>'Succesfullu delete profile desa'];
            }else{
                ['data'=>null];
            }
        }else{
            return ['data'=>null];
        }
    }

}
