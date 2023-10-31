<?php

namespace App\Http\Controllers;

use App\Http\Requests\KhachHangRequest;
use App\Models\KhachHang;
use Illuminate\Http\Request;

class KhachHangController extends Controller
{
    public function index()
    {


        return view('admin.page.khach_hang.index');
    }

    public function data()
    {
        $khachHang = KhachHang::all();

        return response()->json([
            'data'  => $khachHang,
        ]);
    }

    public function store(Request $request)
    {
        $data  = $request->all();
        KhachHang::create($data);

        return response()->json(['status' => true]);
    }

    public function destroy(Request $request)
    {
        $khachHang = KhachHang::where('id', $request->id)->first();
        if($khachHang) {
            $khachHang->delete();
            return response()->json(['status' => true]);
        }
        return response()->json(['status' => false]);
    }
    public function changeStatus(KhachHangRequest $request)
    {
        $khachHang = KhachHang::find($request->id);
        if($khachHang) {
            $khachHang->loai_tai_khoan = !$khachHang->loai_tai_khoan;
            $khachHang->save();
            return response()->json(['status' => true]);
        }
        return response()->json(['status' => false]);
    }
}
