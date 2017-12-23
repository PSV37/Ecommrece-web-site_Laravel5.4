<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AdminController extends Controller
{
    public function index()
    {
    	return view('admin.index');
    }

    public function profile()
    {
    	return view('admin.profile');
    }

     public function addproduct()
    {
    	return view('admin.add');
    }

    public function saveProduct(Request $request)
    {
    	$pro_name = $request->pro_name;
        $pro_price = $request->pro_price;
        $pro_info = $request->pro_info;
    	$cat_id = $request->cat_id;
    	$pro_pic = 'sidebar-5.jpg';
    	$pro_code = $request->pro_code;

        if(isset($request->id))
        {
          $id = $request->id;
          $add_product = DB::table('products')->where('id',$id)
									          ->update([
										         'pro_name' => $pro_name,
										         'pro_price' => $pro_price,
                                                 'pro_code' =>$pro_code,
										         'pro_info' =>$pro_info,
										         'pro_img' =>$pro_pic,
										         //'created_at' =>\Carbon\Carbon::now()->toDateTimeString(),
										         'updated_at' =>\Carbon\Carbon::now()->toDateTimeString(),
									    	   ]);
        }
        else
        {
        	$add_product = DB::table('products')->insert([
		         'pro_name' => $pro_name,
		         'pro_price' => $pro_price,
                 'pro_code' =>$pro_code,
                 'pro_info' =>$pro_info,
		         'cat_id' =>$cat_id,
		         'pro_img' =>$pro_pic,
		         'created_at' =>\Carbon\Carbon::now()->toDateTimeString(),
		         'updated_at' =>\Carbon\Carbon::now()->toDateTimeString(),
    	    ]);
        }
    	

    	if($add_product)
    	{
    		echo "insert";
    	}
    	else
    	{
    		echo "no insert";
    	}

    }

    public function uploadPP(Request $request)
    {
        $product_id = $request->id;
       $file = $request->file('pic');
        $filename = $file->getClientOriginalName();
       $path = 'productimages';
       $file->move($path,$filename);

       $upload_img = DB::table('products')->where('id',$product_id)->update(['pro_img'=>$filename]);
       if($upload_img)
       {
         return back();
       }

    }

    public function saveCategory(Request $request)
    {
        $cat_name = $request->cat_name;

        $add_cat = DB::table('cats')->insert([
         'cat_name' => $cat_name,
         'created_at' =>\Carbon\Carbon::now()->toDateTimeString(),
         'updated_at' =>\Carbon\Carbon::now()->toDateTimeString(),

        ]);


        if($add_cat)
        {
            echo "insert";
        }
        else
        {
            echo "no insert";
        }
    }
}
