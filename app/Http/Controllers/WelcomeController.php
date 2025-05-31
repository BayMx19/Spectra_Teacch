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
}
