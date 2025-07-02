<?php

namespace App\Http\Controllers;

use App\Models\LessonsModel;
use App\Models\SubLessonsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use HTMLPurifier;
use HTMLPurifier_Config;

class SubLessonsController extends Controller
{
    public function index()
    {
        $subLessons = SubLessonsModel::with('lesson')->orderBy('lesson_id')->orderBy('order')->get();

        return view('master_sub_lessons.index', compact('subLessons'));
    }
    public function create()
    {
        $lessons = LessonsModel::with('modules')->orderBy('order')->get();

        return view('master_sub_lessons.create', compact('lessons'));
    }

    public function store(Request $request)
{
    // dd($request->all());
    // dd($request);
    $request->validate([
        'lessons_id' => 'required|exists:lessons,id',
        'title.*' => 'required|string',
        'description.*' => 'required|string',
        'order.*' => 'required|numeric',
        'use_table_data.*' => 'nullable|in:0,1',
        'use_image.*' => 'nullable|in:0,1',
        'table_data_json.*' => 'nullable|string',
        'image_path.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $lessonId = $request->lessons_id;
    $imageFiles = $request->file('image_path', []);

    foreach ($request->title as $index => $title) {
        $subLesson = new SubLessonsModel();
        $subLesson->lesson_id = $lessonId;
        $subLesson->title = $title;
        $config = HTMLPurifier_Config::createDefault();
        $config->set('HTML.Allowed', 'p,b,strong,i,em,u,a[href|title],ul,ol,li,br,img[src|alt|width|height|style],h1,h2,h3,span');
        $config->set('CSS.AllowedProperties', ['width', 'height', 'text-align', 'margin', 'color', 'background-color']);
        $config->set('HTML.SafeIframe', true);
        $config->set('URI.SafeIframeRegexp', '%^(https?:)?//(www.youtube.com/embed/|player.vimeo.com/video/)%');
        $config->set('URI.AllowedSchemes', [
            'http' => true,
            'https' => true,
            'data' => true, 
        ]);

        $purifier = new HTMLPurifier($config);
        

        $rawDescription = $request->description[$index];
        $cleanDescription = $purifier->purify($rawDescription);
        $subLesson->description = $cleanDescription;
        $subLesson->order = $request->order[$index];

        if (isset($request->use_table_data[$index]) && $request->use_table_data[$index] == 1) {
            $subLesson->table_data = $request->table_data_json[$index] ?? null;
        } else {
            $subLesson->table_data = null;
        }

        if (
            isset($request->use_image[$index]) &&
            $request->use_image[$index] == 1 &&
            isset($imageFiles[$index]) &&
            $imageFiles[$index] !== null
        ) {
            $image = $imageFiles[$index];
            $path = $image->store('sublesson_images', 'public');
            $subLesson->image_path = $path;
        } else {
            $subLesson->image_path = null;
        }
        $subLesson->save();
    }

    return redirect()->route('master_sub_lessons.index')->with('success', 'Sub lessons berhasil ditambahkan.');
}

public function edit($id)
{
    $subLesson = SubLessonsModel::findOrFail($id);
    return view('master_sub_lessons.edit', compact('subLesson'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'order' => 'required|integer|min:1',
        'use_table_data' => 'required|in:0,1',
        'table_data_json' => 'nullable|string',
        'use_image' => 'required|in:0,1',
        'image_path' => 'nullable|image|max:2048',
    ]);

    $subLesson = SubLessonsModel::findOrFail($id);

    $subLesson->title = $request->input('title');
    $config = HTMLPurifier_Config::createDefault();
    $config->set('HTML.Allowed', 'p,b,strong,i,em,u,a[href|title],ul,ol,li,br,img[src|alt|width|height|style],h1,h2,h3,span');
    $config->set('CSS.AllowedProperties', ['width', 'height', 'text-align', 'margin', 'color', 'background-color']);
    $config->set('HTML.SafeIframe', true);
    $config->set('URI.SafeIframeRegexp', '%^(https?:)?//(www.youtube.com/embed/|player.vimeo.com/video/)%');
    $config->set('URI.AllowedSchemes', [
        'http' => true,
        'https' => true,
        'data' => true, // ✅ INI PENTING untuk base64 image
    ]);

    $purifier = new HTMLPurifier($config);

    $rawDescription = $request->input('description');
    $cleanDescription = $purifier->purify($rawDescription);
    $subLesson->description = $cleanDescription;

    $subLesson->order = $request->input('order');

    if ($request->input('use_table_data') == '1') {
        $tableDataJson = $request->input('table_data_json');
        if ($tableDataJson) {
            $subLesson->table_data = $tableDataJson;
        } else {
            $subLesson->table_data = null;
        }
    } else {
        $subLesson->table_data = null;
    }

    if ($request->input('use_image') == '1') {
        if ($request->hasFile('image_path')) {
            if ($subLesson->image_path && Storage::exists($subLesson->image_path)) {
                Storage::delete($subLesson->image_path);
            }

            $path = $request->file('image_path')->store('sublesson_images', 'public');
            $subLesson->image_path = $path;
        }
    } else {
        if ($subLesson->image_path && Storage::exists($subLesson->image_path)) {
            Storage::delete($subLesson->image_path);
        }
        $subLesson->image_path = null;
    }

    $subLesson->save();

    return redirect()->route('master_sub_lessons.index', $subLesson->id)
        ->with('success', 'Sub Lesson berhasil diperbarui.');
}

    public function detail($id)
    {
        $subLesson = SubLessonsModel::findOrFail($id);

        $tableData = null;
        if ($subLesson->table_data) {
            $tableData = json_decode($subLesson->table_data, true);
        }

        return view('master_sub_lessons.detail', compact('subLesson', 'tableData'));
    }
    public function destroy($id)
    {
        $subLesson = SubLessonsModel::findOrFail($id);

        if ($subLesson->image_path && Storage::exists($subLesson->image_path)) {
            Storage::delete($subLesson->image_path);
        }

        $subLesson->delete();

        return redirect()->route('master_sub_lessons.index')->with('success', 'Sub Lesson berhasil dihapus.');
    }



}
