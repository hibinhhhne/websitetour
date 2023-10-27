<?php

namespace App\Http\Controllers;

use App\Http\Requests\TinhThanhRequest;
use App\Models\TinhThanh;
use Illuminate\Http\Request;

class TinhThanhController extends Controller
{
    public function index()
    {
        $data = TinhThanh::get();

        return view('admin.page.tinh_thanh.index', compact('data'));
    }

    public function data()
    {
        $tinhThanh = TinhThanh::all();

        return response()->json([
            'data'  => $tinhThanh,
        ]);
    }

    public function store(TinhThanhRequest $request)
    {
        $data  = $request->all();
        TinhThanh::create($data);

        return response()->json(['status' => true]);
    }

    public function destroy(Request $request)
    {
        $tinhThanh = TinhThanh::where('id', $request->id)->first();
        if($tinhThanh) {
            $tinhThanh->delete();
            return response()->json(['status' => true]);
        }
        return response()->json(['status' => false]);
    }
}
