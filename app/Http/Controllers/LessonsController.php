<?php

namespace App\Http\Controllers;

use App\Models\LessonsModel;
use App\Models\ModulesModel;
use Illuminate\Http\Request;

class LessonsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $lessons = LessonsModel::with('modules')->get();
        return view('master_lessons.index', compact('lessons'));
    }
     public function create()
    {
        $modules = ModulesModel::all();
        return view('master_lessons.create', compact('modules'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'module_id' => 'required|exists:modules,id',
            'title.*' => 'required|string',
            'file.*' => 'required|file|mimes:pdf',
        ]);

        foreach ($request->title as $index => $title) {
            $file = $request->file('file')[$index];
            $filePath = $file->store('lessons', 'public');

            LessonsModel::create([
                'module_id' => $request->module_id,
                'title' => $title,
                'order' => $index + 1, // auto generate order mulai dari 1
                'description' => $request->description[$index] ?? '',
                'pdf_path' => $filePath,
            ]);
        }

        return redirect()->route('master_lessons.index')->with('success', 'Beberapa lesson berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $modules = ModulesModel::all();
        $lessons = LessonsModel::with('modules')->findOrFail($id);
        // dd($users);
         return view('master_lessons.edit', compact('modules','lessons'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'module_id' => 'required|exists:modules,id',
            'title' => 'required|string',
            'order' => 'required|integer|min:1',
            'description' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf'
        ]);

        $lesson = LessonsModel::findOrFail($id);
        $lesson->module_id = $request->module_id;
        $lesson->title = $request->title;
        $lesson->order = $request->order;
        $lesson->description = $request->description;

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('lessons', 'public');
            $lesson->pdf_path = $filePath;
        }

        $lesson->save();

        return redirect()->route('master_lessons.index')->with('success', 'Lesson berhasil diperbarui.');
    }

    public function detail($id)
    {
        $modules = ModulesModel::all();
        $lessons = LessonsModel::with('modules')->findOrFail($id);

        return view('master_lessons.detail', compact('modules','lessons'));
    }

    public function destroy($id)
    {
        $lessons = LessonsModel::findOrFail($id);
        $lessons->delete();

        return redirect('/admin/master_lessons/')->with('success', 'Data berhasil dihapus!');
    }


}