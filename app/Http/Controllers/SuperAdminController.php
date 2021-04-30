<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\SuperAdmin;
USe App\Http\Resources\SuperAdmin as SuperAdminResources;
class SuperAdminController extends Controller
{
   public function index(){
       $superAdmin = SuperAdmin::All();
       return new SuperAdminResources($superAdmin);

   }

   public function add(Request $request){
       $superadmin = $request->isMethod('put') ? SuperAdmin::where(['id'=>$request->input('id')])->get():new SuperAdmin(); 
   }
}
