<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Category;
use App\Product;

class ProductsController extends Controller
{
    public function addProduct(Request $request){

        $categories = Category::where(['parent_id'=>0])->get();
        $categories_drpdown = "<option selected disabled>Select</option>";
        foreach($categories as $cat){
            $categories_drpdown .= "<option value='".$cat->id."'>".$cat->name."</option>";
            $sub_category = Category::where(['parent_id'=>$cat->id])->get();
            foreach($sub_category as $sub_cat){
                $categories_drpdown .= "<option value='".$sub_cat->id."'>&nbsp;--&nbsp;".$sub_cat->name."</option>";
            }
        }

        return view('admin.products.add-product')->with(compact('categories_drpdown'));
    }
}
