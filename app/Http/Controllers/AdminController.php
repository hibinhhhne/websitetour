<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {

        $data = Admin::get();

        return view('admin.page.admin.index', compact('data'));
    }

    public function data()
    {
        $Admin = Admin::all();

        return response()->json([
            'data'  => $Admin,
        ]);
    }

    public function store(AdminRequest $request)
    {
        $data  = $request->all();
        $data['password']       =bcrypt($request->password);
        Admin::create($data);

        return response()->json(['status' => true]);
    }

    public function destroy(Request $request)
    {
        $Admin = Admin::where('id', $request->id)->first();
        if($Admin) {
            $Admin->delete();
            return response()->json(['status' => true]);
        }
        return response()->json(['status' => false]);
    }
}
