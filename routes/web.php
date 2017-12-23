<?php

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
});

Auth::routes();

/*Route::get('test',function(){
    return App\Product::with('cat')->get();
});*/

//products
Route::view('products','front.products',['data'=> App\Product::all() , 'catuserby'=>'All Products']);
Route::get('products/{cat}','ProductController@sortCategory');
 Route::get('search','ProductController@search');
 Route::get('ProductDisplay','ProductController@ProductDisplay');


//user middleware
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('dashboard','HomeController@index');

});

//admin middleware start
Route::group(['prefix' => 'admin', 'middleware'=> ['auth' => 'admin']], function () {
    Route::get('/','AdminController@index');
    Route::get('profile','AdminController@profile');
    //Add new Product
    Route::get('addProduct','AdminController@addProduct');
    Route::post('saveProduct', 'AdminController@saveProduct');
    //new route method by laravel 5.5
    Route::view('products', 'admin.products', [
      'data' => App\Product::with('cat')->get()
    ]);
    //edit product
    Route::get('editProduct/{id}', function($id){
      return view('admin.editproduct',[
        'data' => App\product::where('id',$id)->get()
      ]);
    });
    //Route::post('/uploadPP', 'AdminController@uploadPP');
    //change image
    Route::view('/changeImage/{id}','admin.changeImage');
    Route::post('/uploadPP','AdminController@uploadPP');

    //add category
    Route::view('addCategory','admin.addcats');
    Route::view('cats','admin.cats',[
      'data' => App\Cat::all()
    ]);
    Route::post('saveCategory','AdminController@saveCategory');
    //sort product by category
  

  });