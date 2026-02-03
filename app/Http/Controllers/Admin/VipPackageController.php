<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\VipPackage;


class VipPackageController extends Controller
{

    public function index(){

        $exams = VipPackage::all();

        return view('admin.vip_package.index', compact('exams'));
    }

    // create method
    public function create(){
        return view('admin.vip_package.create');
    }

    // store method
    public function store(Request $request){    
        
        if($request->has('id')){
            $vip_package = VipPackage::find($request->id);
        }else{
            $vip_package = new VipPackage();
        }


        $vip_package->title = $request->title;
        $vip_package->description = $request->description;

        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('paketler'), $image_name);
            $vip_package->image = 'paketler/' . $image_name;
        }
        
        $vip_package->grade = $request->grade;
        $vip_package->status = $request->status;
        $vip_package->price = $request->price;
        $vip_package->save();

        return redirect()->route('admin.vip_package.index')->with('success', 'VIP paketi başarıyla oluşturuldu.');
    }

    // edit method
    public function edit($id){
        $vip_package = VipPackage::find($id);
        return view('admin.vip_package.edit', compact('vip_package'));        
    }

    // destroy method
    public function destroy($id){
        $vip_package = VipPackage::find($id);
        if($vip_package){
            $vip_package->delete();
            return redirect()->route('admin.vip_package.index')->with('success', 'VIP paketi başarıyla silindi.');
        }
        return redirect()->route('admin.vip_package.index')->with('error', 'VIP paketi bulunamadı.');
    }
}