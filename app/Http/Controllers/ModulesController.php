<?php

namespace App\Http\Controllers;

use App\Models\ModulesModel;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModulesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $modules = ModulesModel::get()->map(function ($item) {
            $item->created_at = \Carbon\Carbon::parse($item->created_at);
            return $item;
        });
        // dd($modules);
        return view('master_modules.index', compact('modules'));
    }

    public function create()
    {
        return view('master_modules.create');
    }
    public function store(Request $request)
    {
        // dd($request);
        try{
            DB::table('modules')->insert([
                'title' => $request->title,
                'description' => $request->description,
                'created_at' => Carbon::now(),
            ]);

            return redirect('/admin/master_modules/')->with('success', 'Modules berhasil ditambahkan.');
        } catch (QueryException $e) {
            return redirect('/admin/master_modules/')->with('error', 'Gagal menambahkan Modules: Coba Lagi' );
        }
    }

    public function detail($id)
    {
        $modules = ModulesModel::findOrFail($id);
        // dd($modules);
         return view('master_modules.detail', compact('modules'));

    }

    public function edit($id)
    {
        $modules = ModulesModel::findOrFail($id);
        // dd($modules);
         return view('master_modules.edit', compact('modules'));
    }

    public function update(Request $request, $id)
    {
        $modules = ModulesModel::find($id);
        // dd($modules);
        $dataUpdate = [
            'title' => $request->title,
            'description' => $request->description,
            'updated_at' => Carbon::now(),
        ];


        DB::table('modules')->where('id', $id)->update($dataUpdate);

        return redirect('/admin/master_modules/')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $modules = ModulesModel::findOrFail($id);
        $modules->delete();

        return redirect('/admin/master_modules/')->with('success', 'Data berhasil dihapus!');
    }
}