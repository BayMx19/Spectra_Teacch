<?php

namespace App\Http\Controllers;

use App\Models\LessonsModel;
use App\Models\ModulesModel;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $modules = ModulesModel::with('lessons')->get();
        // dd($modules);
        return view('welcome', compact('modules'));
    }

    public function show($id)
    {
        $modules = ModulesModel::with('lessons')->findOrFail($id);
        // dd($modules);
        return view('modules.show', compact('modules'));
    }

    // public function lesson($id)
    // {
    //     $lesson = LessonsModel::findOrFail($id);
    //     return view('landing.lesson', compact('lesson'));
    // }

public function showLesson($id)
{
    $modules = ModulesModel::with('lessons')->findOrFail($id);

    $lesson = LessonsModel::with(['subLessons' => function ($query) {
        $query->orderBy('order');
    }])->findOrFail($id);

    if (request()->wantsJson()) {
        return response()->json([
            'title' => $lesson->title,
            'description' => $lesson->description,
            'file' => $lesson->pdf_path,
            'sub_lessons' => $lesson->subLessons->map(function ($subLesson) {
                return [
                    'id' => $subLesson->id,
                    'title' => $subLesson->title,
                    'description' => $subLesson->description,
                    'order' => $subLesson->order,
                    'table_data' => $subLesson->table_data,
                    'image_path' => $subLesson->image_path ? asset('storage/' . $subLesson->image_path) : null,
                ];
            }),
        ]);
    }

    // Kalau bukan request JSON, kirim view (misalnya tampilan detail lesson)
    return view('modules.show', compact('lesson'));
}


}
