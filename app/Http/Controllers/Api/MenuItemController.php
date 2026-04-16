<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MenuItem;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    public function index(Request $request)
    {
        $query = MenuItem::query();

        if ($request->has('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        return response()->json($query->orderBy('sort_order')->get());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id'  => 'required|exists:menu_categories,id',
            'name'         => 'required|string|max:255',
            'description'  => 'nullable|string',
            'price'        => 'required|string|max:50',
            'image_url'    => 'nullable|string|max:500',
            'sub_category' => 'nullable|string|max:100',
            'sort_order'   => 'integer',
        ]);

        return response()->json(MenuItem::create($data), 201);
    }

    public function update(Request $request, $id)
    {
        $item = MenuItem::findOrFail($id);

        $data = $request->validate([
            'category_id'  => 'sometimes|exists:menu_categories,id',
            'name'         => 'sometimes|required|string|max:255',
            'description'  => 'nullable|string',
            'price'        => 'sometimes|required|string|max:50',
            'image_url'    => 'nullable|string|max:500',
            'sub_category' => 'nullable|string|max:100',
            'sort_order'   => 'integer',
        ]);

        $item->update($data);

        return response()->json($item);
    }

    public function destroy($id)
    {
        MenuItem::findOrFail($id)->delete();

        return response()->json(null, 204);
    }
}
