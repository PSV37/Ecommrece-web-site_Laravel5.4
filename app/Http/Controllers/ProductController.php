<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
{
    public function sortCategory(Request $request)
    {
    	$cat =  $request->cat;

    	$cat_data = DB::table('products as p')->join('cats as c','c.id','p.cat_id')->where('c.cat_name',$cat)->get();
        return view('front.products',[
         'data'=> $cat_data,'catuserby'=>$cat,
        ]);
    }

    public function ProductDisplay(Request $request)
    {
    	$cat_id = $request->cat_id;
    	$data = DB::table('products as p')->join('cats as c','c.id','p.cat_id')
    	                                  ->where('p.cat_id',$cat_id)
    	                                  ->get();
    	 return view('front.ProductDisplay',[
    	  'data'=>$data , 'catuserby'=>$data[0]->cat_name
    	 ]);                           
    }

    public function search(Request $request)
    {
    	$searchData = $request->searchData;

    	$data = DB::table('products as p')->join('cats as c','c.id','p.cat_id')
    	                          ->where('p.pro_name','like','%'.$searchData .'%')
    	                          ->get();
    	   return view('front.products',[
    	    'data'=>$data , 'catuserby'=>$searchData
    	   ]);                     
    }
}
