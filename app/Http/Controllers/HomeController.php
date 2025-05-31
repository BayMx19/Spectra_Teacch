<?php

namespace App\Http\Controllers;

use App\Models\LessonsModel;
use App\Models\ModulesModel;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userCount = User::count();
        $moduleCount = ModulesModel::count();
        $lessonCount = LessonsModel::count();
        return view('home', compact('userCount', 'moduleCount', 'lessonCount'));
    }
}