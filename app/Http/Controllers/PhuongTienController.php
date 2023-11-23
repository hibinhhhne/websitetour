<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhuongTienRequest;
use App\Models\PhuongTien;
use Illuminate\Http\Request;

class PhuongTienController extends Controller
{
    public function index()
    {
        $data = PhuongTien::get();

        return view('admin.page.phuong_tien.index', compact('data'));
    }

    public function data()
    {
        $phuongTien = PhuongTien::all();

        return response()->json([
            'data'  => $phuongTien,
        ]);
    }

    public function store(PhuongTienRequest $request)
    {
        $data  = $request->all();
        PhuongTien::create($data);

        return response()->json([
            'status'    => 1,
            'message'   => 'Đã thêm mới thành công!',
        ]);
    }

    public function destroy(Request $request)
    {
        $phuongTien = PhuongTien::where('id', $request->id)->first();
        if($phuongTien) {
            $phuongTien->delete();
            return response()->json([
                'status'    => 1,
                'message'   => 'Đã xóa thành công!',
            ]);
        }
        return response()->json([
            'status'    => 0,
            'message'   => 'Đã gặp lỗi!',
        ]);
    }
    public function changeStatus(PhuongTienRequest $request)
    {
        $phuongTien = PhuongTien::find($request->id);
        if($phuongTien) {
            $phuongTien->trang_thai = !$phuongTien->trang_thai;
            $phuongTien->save();
            return response()->json([
                'status'    => 1,
                'message'   => 'Đã đổi trạng thái thành công!',
            ]);
        }
        return response()->json([
            'status'    => 0,
            'message'   => 'Đã gặp lỗi!',
        ]);
    }

    public function update(Request $request)
    {
        $phuongTien = PhuongTien::where('id', $request->id)->first();
        if($phuongTien) {
            $phuongTien->update($request->all());
            return response()->json([
                'status'    => 1,
                'message'   => 'Đã cập nhật thành công!',
            ]);
        }
        return response()->json([
            'status'    => 0,
            'message'   => 'Đã gặp lỗi!',
        ]);
    }
}
