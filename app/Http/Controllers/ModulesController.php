<?php

namespace App\Http\Controllers;

use App\Models\ModulesModel;
use Illuminate\Http\Request;

class ModulesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $modules = ModulesModel::all();
        // dd($modules);
        return view('master_modules.index', compact('modules'));
    }
}