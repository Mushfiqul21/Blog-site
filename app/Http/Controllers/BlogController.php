<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\BlogImage;
use App\Models\Category;
use Illuminate\Http\Request;


class BlogController extends Controller
{
    public function index() // all data show list
    {
        $blogData = blog::with(['category'])->get();
        return view('blog.blog-list', ['blogData' => $blogData]);
    }

    public function create() //data entry form 
    {
        $category = Category::all();
        return view('blog.add-blog', ['categories' => $category]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'description' => 'required',
            // 'category' => 'required',
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'images' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $blog = new blog();
        $blog->title = $request->name;
        $blog->description = $request->description;
        $blog->category_id = $request->category;

        if ($request->hasFile('thumbnail')) {
            $thumbnailFile = $request->file('thumbnail');
            $thumbnailPath = time() . '_' . $thumbnailFile->getClientOriginalName();
            $thumbnailFile->move(public_path('thumbnails'), $thumbnailPath);
            $blog->thumbnail = 'thumbnails/' . $thumbnailPath;
        }
        if ($blog->save()) {

            if ($request->hasFile('image')) {
                foreach ($request->file('image') as $image) {
                    $blogImage = new BlogImage();
                    $blogImage->blog_id = $blog->id;
                    $imagepath = time() . '_' . $image->getClientOriginalName();
                    $image->move(public_path('images'), $imagepath);
                    $blogImage->image = 'images/' . $imagepath;
                    $blogImage->save();
                }
            }

            return redirect()->route("blog.list")->with("Blog has been created successfully");
        }
        return redirect()->route("blog.list")->with("Failed to create blog");
    }

    public function show($id) //single data show
    {
        $blogData = blog::with(['blogImage'])->find($id);
        return view('blog.blog-view', ['blogData' => $blogData]);
    }

    public function edit($id) //data editing form
    {
        $blogData = blog::find($id);

        return view('blog.blog-edit', ['blogData' => $blogData]);
    }

    public function update(Request $request, $id) //data update
    {
        $request->validate([
            'title' => 'required|string|min:3|max:255',
            'description' => 'required',
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'images' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $blog = blog::find($id);
        $blog->title = $request->title;
        $blog->description = $request->description;

        if ($request->hasFile('thumbnail')) {
            if ($blog->thumbnail) {
                $preThumbnailPath = public_path($blog->thumbnail);
                if (file_exists($preThumbnailPath)) {
                    unlink($preThumbnailPath);
                }
            }
            $thumbnailFile = $request->file('thumbnail');
            $thumbnailPath = time() . '_' . $thumbnailFile->getClientOriginalName();
            $thumbnailFile->move(public_path('thumbnails'), $thumbnailPath);
            $blog->thumbnail = 'thumbnails/' . $thumbnailPath;
        }
        if ($blog->save()) {
            if ($request->hasFile('image')) {
                $blogimage = BlogImage::where('blog_id', $blog->id)->get();
                foreach ($blogimage as $row) {
                    if ($row->delete()) {
                        if ($row->image) {
                            $oldImagePath = public_path($row->image);
                            if (file_exists($oldImagePath)) {
                                unlink($oldImagePath);
                            }
                        }
                    }
                }
                foreach ($request->file('image') as $image) {
                    $blogImage = new BlogImage();
                    $blogImage->blog_id = $blog->id;
                    $imagepath = time() . '_' . $image->getClientOriginalName();
                    $image->move(public_path('images'), $imagepath);
                    $blogImage->image = 'images/' . $imagepath;
                    $blogImage->save();
                }
            }
            return redirect()->route('blog.list')->with('success', 'Blog updated successfully.');
        }
        return redirect()->route('blog.edit', $id)->with('error', 'Failed to update blog.');
    }


    public function destroy($id) //data delete
    {
        blog::find($id)->delete();
        return redirect()->route('blog.list');
    }
}
