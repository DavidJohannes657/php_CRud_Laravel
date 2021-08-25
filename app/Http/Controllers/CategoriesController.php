<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

class CategoriesController extends Controller
{
    function __construct(){
        $this->middleware('auth');
    }

    function show(){
        $categoryList = Categories::all(); //Select * from products;
        return view('category/list',['list'=> $categoryList]);
    }
    function delete($id){
        //Product::destroy($id);
        $brand = Categories::findOrFail($id);
        $brand ->delete();
        return redirect('/categories')->with('message', 'La marca fue borrada');
    }

    function form($id= null){
        $category=new Categories();
        if($id != null){
            $category = Categories::findOrFail($id);

        }
        return view('category/form',['category'=>$category]);
    }

    function save(Request $request){

        $request->validate([
            'name'=>'required|max:50',
            'description'=>'required|max:1000'

        ]);



        $category = new Categories();
$message = 'Se ha creado una marca Categoria';
        if(intval($request->id)>0){
            $category=Categories::findOrFail($request->id);
            $message = 'Se ha editado una Categoria';
        }

        $category->name=$request->name;
        $category->description=$request->description;


        $category->save();
        //return redirect ('/brands')->with('successMessage', $message);
        return redirect('/categories')->with('message', 'La categoria fue guardada');

    }
}
