<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all(); 
        return view('admin.category.category',compact('categories'));
    }

    public function insertform(){
        return view('admin.category.category');
        }
        public function insert(Request $request){
        $category_name = $request->input('first_name');
        $user_id = $request->input('user_id');
        $data=array('category_name'=>$category_name,"user_id"=>$user_id);
        Category::table('categories')->insert($data);
        }
}
