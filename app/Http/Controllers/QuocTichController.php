<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuocTichRequest;
use App\Models\QuocTich;
use Illuminate\Http\Request;

class QuocTichController extends Controller
{
    public function index()
    {
        $data = QuocTich::get();

        return view('admin.page.quoc_tich.index', compact('data'));
    }

    public function data()
    {
        $quocTich = QuocTich::all();

        return response()->json([
            'data'  => $quocTich,
        ]);
    }

    public function store(QuocTichRequest $request) //tự tạo CreateDatTourRequest rồi thay vào Request tạm thời
    {
        $data  = $request->all();
        QuocTich::create($data);

        return response()->json([
            'status'    => 1,
            'message'   => 'Đã thêm mới thành công!',
        ]);
    }

    public function destroy(Request $request)
    {
        $quocTich = QuocTich::where('id', $request->id)->first();
        if($quocTich) {
            $quocTich->delete();
            return response()->json([
            'status'    => 1,
            'message'   => 'Đã xóa thành công!',
        ]);
        }
        return response()->json([
            'status'    => 1,
            'message'   => 'Đã gặp lỗi!',
        ]);

    }

    public function update(Request $request)
    {
        $quocTich = QuocTich::where('id', $request->id)->first();

        $quocTich->update($request->all());

        return response()->json([
            'status'    => 1,
            'message'   => 'Đã cập nhật thành công!',
        ]);
    }
}
