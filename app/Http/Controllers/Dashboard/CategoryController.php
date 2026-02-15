<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->paginate(15);
        return view('dashboard.pages.categories.index', compact('categories'));
    }

    public function show(Category $category)
    {
        return view('dashboard.pages.categories.show', compact('category'));
    }

    public function create()
    {
        return view('dashboard.pages.categories.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        $data = $request->validated();
        $category = new Category();
        $category->status = $data['status'];
        $category->setTranslations('name', $data['name']);
        $category->slug = !empty($data['slug']) ? $data['slug'] : Category::generateUniqueSlug($data['name']['en']);
        $category->save();
        return redirect()->route('dashboard.categories.index')->with('success', 'Category created successfully');
    }

    public function edit(Category $category)
    {
        return view('dashboard.pages.categories.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $data = $request->validated();
        $category->status = $data['status'];
        $category->setTranslations('name', $data['name']);
        if (!empty($data['slug'])) {
            $category->slug = $data['slug'];
        } else {
            $category->slug = Category::generateUniqueSlug($data['name']['en']);
        }
        $category->save();
        return redirect()->route('dashboard.categories.index')->with('success', 'Category updated successfully');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('dashboard.categories.index')->with('success', 'Category deleted successfully');
    }
}
