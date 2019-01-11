<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function addCategory(Request $request){

        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            $category = new Category();
            $category->name = $data['category_name'];
            $category->parent_id = $data['parent_id'];
            $category->description = $data['description'];
            $category->url = $data['url'];
            $category->save();
            return redirect('/admin/view-category')->with('flash_message_success', 'Category Created success');
        }

        $levles = Category::where(['parent_id'=>0])->get();

        return view('admin.category.add_category')->with(compact('levles'));
    }

    public function editCategory(Request $request, $id = null){

        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            Category::where(['id'=>$id])->update(['name'=>$data['category_name'],'description'=>$data['description'],'url'=>$data['url']]);

            return redirect('/admin/view-category')->with('flash_message_success', 'Category Updated success');
        }
        $categoryDetail = Category::where(['id'=>$id])->first();
        $levles = Category::where(['parent_id'=>1])->get();
        return view('admin.category.edit_categories')->with(compact('categoryDetail','levles'));
    }

    public function deleteCategory($id = null){
        if(!empty($id)){
            Category::where(['id'=>$id])->delete();

            return redirect()->back()->with('flash_message_succes', 'Category Deleted success');
        }
    }

    public function viewCategories(){

        $categories = Category::get();

        return view('admin.category.view_categories')->with(compact('categories'));
    }
}
