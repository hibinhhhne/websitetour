<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaiKhoanRequest;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;

class TaiKhoanController extends Controller
{
    public function index()
    {
        $data = TaiKhoan::get();

        return view('admin.page.tai_khoan.index', compact('data'));
    }

    public function data()
    {
        $taiKhoan = TaiKhoan::all();

        return response()->json([
            'data'  => $taiKhoan,
        ]);
    }

    public function store(TaiKhoanRequest $request)
    {
        $data  = $request->all();
        TaiKhoan::create($data);

        return response()->json(['status' => true]);
    }

    public function destroy(Request $request)
    {
        $taiKhoan = TaiKhoan::where('id', $request->id)->first();
        if($taiKhoan) {
            $taiKhoan->delete();
            return response()->json(['status' => true]);
        }
        return response()->json(['status' => false]);
    }
   
}
