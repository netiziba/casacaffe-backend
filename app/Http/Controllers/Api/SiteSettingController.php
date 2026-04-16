<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    public function index()
    {
        return response()->json(SiteSetting::all()->keyBy('key'));
    }

    public function upsert(Request $request)
    {
        $data = $request->validate([
            'key'   => 'required|string|max:100',
            'value' => 'required|string',
        ]);

        $setting = SiteSetting::updateOrCreate(
            ['key' => $data['key']],
            ['value' => $data['value']]
        );

        return response()->json($setting);
    }
}
