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

        return response()->json([
            'status'    => 1,
            'message'   => 'Đã thêm mới thành công!',
        ]);
    }

    public function destroy(Request $request)
    {
        $tinhThanh = TinhThanh::where('id', $request->id)->first();
        if($tinhThanh) {
            $tinhThanh->delete();
            return response()->json([
                'status'    => 1,
                'message'   => 'Đã xóa thành công!',
            ]);
        }
        return response()->json([
            'status'    => 0,
            'message'   => 'Đã gặp lỗi!!',
        ]);
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $tinhThanh = TinhThanh::where('id', $request->id)->first();
        if($tinhThanh) {
            $tinhThanh->update($data);
            return response()->json([
                'status'    => 1,
                'message'   => 'Đã cập nhật thành công!',
            ]);
        }
        return response()->json([
            'status'    => 0,
            'message'   => 'Đã gặp sự cố!',
        ]);
    }
}
