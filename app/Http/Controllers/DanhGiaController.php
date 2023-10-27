<?php

namespace App\Http\Controllers;

use App\Http\Requests\DanhGiaRequest;
use App\Models\DanhGia;
use Illuminate\Http\Request;

class DanhGiaController extends Controller
{
    public function index()
    {
        $data = DanhGia::get();

        return view('admin.page.danh_gia.index', compact('data'));
    }

    public function data()
    {
        $danhGia = DanhGia::all();

        return response()->json([
            'data'  => $danhGia,
        ]);
    }

    public function store(DanhGiaRequest $request)
    {
        $data  = $request->all();
        DanhGia::create($data);

        return response()->json([
            'status'    => true,
        ]);

    }
    public function update(DanhGiaRequest $request)
    {
        $danhGia = DanhGia::where('id', $request->id)->first();

        $danhGia->update($request->all());

        return response()->json(['status' => true]);
    }

    public function destroy(DanhGiaRequest $request)
    {
        $danhGia = DanhGia::where('id', $request->id)->first();
        if($danhGia) {
            $danhGia->delete();
            return response()->json(['status' => true]);
        }
        return response()->json(['status' => false]);

    }

    public function changeStatus(DanhGiaRequest $request)
    {
        $danhGia = DanhGia::find($request->id);
        if($danhGia) {
            $danhGia->trang_thai = !$danhGia->trang_thai;
            $danhGia->save();
            return response()->json(['status' => true]);
        }
        return response()->json(['status' => false]);
    }
}
