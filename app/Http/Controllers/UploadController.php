<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function uploadImage(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $file->store('summernote_images', 'public');
            $url = '/storage/' . $path;
            return response()->json(['url' => $url]);
        }
        return response()->json(['error' => 'No file uploaded.'], 400);
    }
}
