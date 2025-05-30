<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('master_users.index', compact('users'));
    }
    public function create()
    {
        return view('master_users.create');
    }

    public function store(Request $request)
    {
        // dd($request);
        try{
            DB::table('users')->insert([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'status' => $request->status,
            ]);

            return redirect('/admin/master_users/')->with('success', 'User berhasil ditambahkan.');
        } catch (QueryException $e) {
            return redirect('/admin/master_users/')->with('error', 'Gagal menambahkan User: Coba Lagi' );
        }
    }

        public function detail($id)
    {
        $users = User::findOrFail($id);
        // dd($users);
         return view('master_users.detail', compact('users'));

    }

        public function edit($id)
    {
        $users = User::findOrFail($id);
        // dd($users);
         return view('master_users.edit', compact('users'));
    }

    public function update(Request $request, $id)
    {
        $users = User::find($id);
        // dd($users);
        $dataUpdate = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'status' => $request->status,
        ];


        DB::table('users')->where('id', $id)->update($dataUpdate);

        return redirect('/admin/master_users/')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $users = User::findOrFail($id);
        $users->delete();

        return redirect('/admin/master_users/')->with('success', 'Data berhasil dihapus!');
    }



}
