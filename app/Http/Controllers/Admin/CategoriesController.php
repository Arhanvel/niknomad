<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.categories.index')->with([
            'categoryList' => Category::query()->latest()->paginate(10)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Category::create($this->prepateCategory($request));

        return redirect('admin/categories')->with(['success' => 'Category Created']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $category->update($this->prepateCategory($request, $category));

        return redirect('admin/categories')->with(['success' => 'Category Updated']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if ($category->posts()->count() > 0) {
            return redirect('admin/categories')->with(['error' => 'Category has posts associated with it']);
        }

        $category->delete();

        return redirect('admin/categories')->with(['success' => 'Category Deleted']);
    }

    protected function prepateCategory(Request $request, ?Category $category = null): array
    {
        $category ??= new Category();

        $attributes = $request->validate([
            'name' => 'required'
        ]);

        $attributes['slug'] = Str::slug($attributes['name']);

        return $attributes;
    }
}
