<?php

use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoriesController;

use Illuminate\Support\Facades\Route;
//use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::get('/nombre/{unaVariable}', function ($unaVariable) {
    return "Nombre: ".ucwords($unaVariable);
})->where('unaVariable' , '[A-Za-zñÑ]+');




Route::get('/numero/{documento}', [PersonaController::class, 'mostrarNombre']
)->where('documento' , '[0-9]+');


Route::get('/numero/{unaVariable?}', function ($unaVariable = null) {

    if(!$unaVariable){
        //Cuando sea null ejecutar esto
       return "Debe enviar un valor númerico";
    }
    return number_format($unaVariable);

})->where('documento' , '[0-9]+');

// Route::get('/products', function () {
//   $products = DB::table('products')->get();
//    return dd($products);
// });
//use App\Http\Controllers\ProductController;
Route::get('/products' , [ProductController::class , "show"]);


//[0-9]+

Route::get('/product/delete/{id}' , [ProductController::class , 'delete'])->name('product.delete');

Route::get('product/form/{id?}',[ProductController::class,'form'])->name('product.form');
Route::post('product/save',[ProductController::class,'save'])->name('product.save');
Auth::routes();



Route::get('/brands' , [BrandController::class , "show"]);
Route::get('/brand/delete/{id}' , [BrandController::class , 'delete'])->name('brand.delete');

Route::get('brand/form/{id?}',[BrandController::class,'form'])->name('brand.form');
Route::post('brand/save',[BrandController::class,'save'])->name('brand.save');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/categories' , [CategoriesController::class , "show"]);
Route::get('/category/delete/{id}' , [CategoriesController::class , 'delete'])->name('category.delete');

Route::get('category/form/{id?}',[CategoriesController::class,'form'])->name('category.form');
Route::post('category/save',[CategoriesController::class,'save'])->name('category.save');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




