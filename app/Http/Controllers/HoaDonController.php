<?php

namespace App\Http\Controllers;

use App\Http\Requests\HoaDonRequest;
use App\Models\HoaDon;
use Illuminate\Http\Request;

class HoaDonController extends Controller
{
    public function index()
    {
        $data = HoaDon::get();

        return view('admin.page.hoa_don.index', compact('data'));
    }

    public function data()
    {
        $hoaDon = HoaDon::all();

        return response()->json([
            'data'  => $hoaDon,
        ]);
    }

    public function store(HoaDonRequest $request)
    {
        $data  = $request->all();
        HoaDon::create($data);

        return response()->json(['status' => true]);
    }

    public function destroy(Request $request)
    {
        $hoaDon = HoaDon::where('id', $request->id)->first();
        if($hoaDon) {
            $hoaDon->delete();
            return response()->json(['status' => true]);
        }
        return response()->json(['status' => false]);
    }

    public function changeStatus(HoaDonRequest $request)
    {
        $hoaDon = HoaDon::find($request->id);
        if($hoaDon) {
            $hoaDon->trang_thai_thanh_toan = !$hoaDon->trang_thai_thanh_toan;
            $hoaDon->save();
            return response()->json(['status' => true]);
        }
        return response()->json(['status' => false]);
    }
}
