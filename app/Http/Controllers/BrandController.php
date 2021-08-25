<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
class BrandController extends Controller
{
    function __construct(){
        $this->middleware('auth');
    }

    function show(){
        $brandList = Brand::all(); //Select * from products;
        return view('brand/list',['list'=> $brandList]);
    }
    function delete($id){
        //Product::destroy($id);
        $brand = Brand::findOrFail($id);
        $brand ->delete();
        return redirect('/brands')->with('message', 'El producto fue borrado');
    }

    function form($id= null){
        $brand=new Brand();
        if($id != null){
            $brand = Brand::findOrFail($id);

        }
        return view('brand/form',['brand'=>$brand]);
    }

    function save(Request $request){
        return redirect('/brands')->with('message', 'La marca fue guardada');
        $request->validate([
            'name'=>'required|max:50'

        ]);



        $brand = new Brand();
$message = 'Se ha creado una marca nueva';
        if(intval($request->id)>0){
            $brand=Brand::findOrFail($request->id);
            $message = 'Se ha editado un producto';
        }

        $brand->name=$request->name;


        $brand->save();
        return redirect ('/brands')->with('successMessage', $message);

    }
}
