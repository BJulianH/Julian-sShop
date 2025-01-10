<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index(){
        $data['penggunas'] = User::paginate(25);
        return view('content.admin.manage_user', $data);
    }

    public function datatable(Request $request){
        $data = User::query();

        return DataTables::of($data) -> make();
    }

    public function edit(String $id){
        $data['user'] = User::findOrFail($id);
        return view('content.admin.manage-user-edit', $data);
    }

    public function destroy(String $id){
        User::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'berhasil dihapus');
    }

    public function update(Request $request, String $id){
        User::findOrFail($id)->update(); ([
            'username' => $request-> username,
            'email' => $request-> email,
        ]);

        return redirect()->back()->with('success', 'berhasil dihapus');
    }

}
