<?php

namespace App\Http\Controllers;

use App\Http\Requests\KhachHangRequest;
use App\Models\KhachHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        return response()->json([
            'status'    => 1,
            'message'   => 'Đã thêm mới thành công!',
        ]);
    }

    public function destroy(Request $request)
    {
        $khachHang = KhachHang::where('id', $request->id)->first();
        if($khachHang) {
            $khachHang->delete();
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

    public function changeStatus(Request $request)
    {
        $khachHang = KhachHang::find($request->id);
        if($khachHang) {
            $khachHang->loai_tai_khoan = !$khachHang->loai_tai_khoan;
            $khachHang->save();
            return response()->json([
                'status'    => 1,
                'message'   => 'Đã đổi trạng thái thành công!',
            ]);
        }
        return response()->json([
            'status'    => 0,
            'message'   => 'Đã gặp lỗi!!',
        ]);
    }

    public function update(KhachHangRequest $request){
        $data = $request->all();
        // dd($data);
        $khachHang = KhachHang::where('id',$request->id)->first();
        if($khachHang){
            $khachHang->update($data);
            return response()->json([
                'status' => true,
                'message'   => "Cập nhật thành công!",
            ]);
        }else{
            return response()->json([
                'status' => false,
                'message'   => "Không tồn tại!",
            ]);
        }
    }
}
