<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() // all data show list
    {
        $categoryData = Category::all();
        return view('pages.category-list', ['categoryData' => $categoryData]);
    }

    public function create() //data entry form 
    {
        return view('pages.add-category');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:255',
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->parent_id = $request->parent_id;

        if($category->save()){
            if ($request->hasFile('image')) {
                $imageFile = $request->file('image');
                $imagePath = time() . '_' . $imageFile->getClientOriginalName();
                $imageFile->move(public_path('category_images'), $imagePath);
                $category->image = 'category_images/' . $imagePath;
            }
            return redirect()->route("category.list")->with("Category has been created successfully");
        }
        
    }
}
