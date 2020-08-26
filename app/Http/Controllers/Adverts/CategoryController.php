<?php

namespace App\Http\Controllers\Adverts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::defaultOrder()->withDepth()->get();

        return view('admin.adverts.categories.index', compact('categories'));
    }

    public function create()
    {
        $parents = Category::defaultOrder()->withDepth()->get();

        return view('admin.adverts.categories.create', compact('parents'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'parent' => 'nullable|integer|exists:advert_categories,id',
        ]);

        $category = Category::create([
            'name' => $request['name'],
            'slug' => $request['slug'],
            'parent_id' => $request['parent'],
        ]);

        return redirect()->route('admin.adverts.categories.show', $category);
    }

    public function show(Category $category)
    {
        return view('admin.adverts.categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        $parents = Category::defaultOrder()->withDepth()->get();

        return view('admin.adverts.categories.edit', compact('category', 'parents'));
    }

    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'parent' => 'nullable|integer|exists:advert_categories,id',
        ]);

        $category->update([
            'name' => $request['name'],
            'slug' => $request['slug'],
            'parent_id' => $request['parent'],
        ]);

        return redirect()->route('admin.adverts.categories.show', $category);
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.adverts.categories.index');
    }
}
