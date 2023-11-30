<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all(); 
        return view('admin.category.category',compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_name' => 'required|string|max:255',
            'category_img'  => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $category = new Category([
            'category_name' => $validatedData['category_name'],
            'user_id' => 1,
        ]);
        if ($request->hasFile('category_img')) {
            $imagePath = $request->file('category_img')->store('category_images', 'public');
            $category->category_img = 'category_images/' . basename($imagePath);
        }
        $category->save();
        return redirect()->back()->with('success', 'Category created successfully.');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
    $validatedData = $request->validate([
        'category_name' => 'required|string|max:255',
        'category_img'  => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $category = Category::findOrFail($id);
    $category->category_name = $validatedData['category_name'];

    if ($request->hasFile('category_img')) {
        $imagePath = $request->file('category_img')->store('category_images', 'public');
        $category->category_img = 'category_images/' . basename($imagePath);
    }

    $category->save();

    return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        if ($category->category_img) {
            Storage::disk('public')->delete($category->category_img);
        }

        $category->delete();

        return redirect()->back()->with('success', 'Category deleted successfully.');
    }
}