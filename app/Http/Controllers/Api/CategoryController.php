<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * List all categories (public)
     */
    public function index()
    {
        $categories = Category::with('parent')
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return response()->json($categories);
    }

    /**
     * Get single category with products
     */
    public function show($slug)
    {
        $category = Category::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $products = $category->products()
            ->with(['images', 'variants'])
            ->where('status', 'active')
            ->paginate(12);

        return response()->json([
            'category' => $category,
            'products' => $products
        ]);
    }

    /**
     * Admin: Store new category
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:categories|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
            'parent_id' => 'nullable|exists:categories,id',
            'sort_order' => 'integer|min:0',
            'is_active' => 'boolean',
        ]);

        $category = Category::create($validated);

        return response()->json($category, 201);
    }

    /**
     * Admin: Update category
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $validated = $request->validate([
            'name' => 'string|max:255',
            'slug' => 'string|max:255|unique:categories,slug,' . $id,
            'description' => 'nullable|string',
            'image' => 'nullable|string',
            'parent_id' => 'nullable|exists:categories,id',
            'sort_order' => 'integer|min:0',
            'is_active' => 'boolean',
        ]);

        $category->update($validated);

        return response()->json($category);
    }

    /**
     * Admin: Delete category
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        
        // Set children's parent to null
        $category->children()->update(['parent_id' => null]);
        
        $category->delete();

        return response()->json(['message' => 'Category deleted successfully']);
    }
}
