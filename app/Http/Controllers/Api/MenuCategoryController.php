<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MenuCategory;
use Illuminate\Http\Request;

class MenuCategoryController extends Controller
{
    public function index()
    {
        return response()->json(
            MenuCategory::orderBy('sort_order')->get()
        );
    }

    public function show($id)
    {
        return response()->json(
            MenuCategory::with(['items' => fn ($q) => $q->orderBy('sort_order')])->findOrFail($id)
        );
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'         => 'required|string|max:255',
            'icon'          => 'required|string|max:100',
            'has_images'    => 'boolean',
            'sort_order'    => 'integer',
            'show_in_menu'  => 'boolean',
        ]);

        $category = MenuCategory::create(array_merge(
            ['has_images' => true, 'show_in_menu' => true],
            $data
        ));

        return response()->json($category, 201);
    }

    public function update(Request $request, $id)
    {
        $category = MenuCategory::findOrFail($id);

        $data = $request->validate([
            'title'         => 'sometimes|required|string|max:255',
            'icon'          => 'sometimes|required|string|max:100',
            'has_images'    => 'boolean',
            'sort_order'    => 'integer',
            'show_in_menu'  => 'boolean',
        ]);

        $category->update($data);

        return response()->json($category);
    }

    public function destroy($id)
    {
        MenuCategory::findOrFail($id)->delete();

        return response()->json(null, 204);
    }
}
