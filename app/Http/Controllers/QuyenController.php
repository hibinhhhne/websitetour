<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuyenRequest;
use App\Models\Quyen;
use Illuminate\Http\Request;

class QuyenController extends Controller
{
    public function index()
    {
        $data = Quyen::get();

        return view('admin.page.quyen.index', compact('data'));
    }

    public function data()
    {
        $Quyen = Quyen::all();

        return response()->json([
            'data'  => $Quyen,
        ]);
    }

    public function store(QuyenRequest $request)
    {
        $data  = $request->all();
        Quyen::create($data);

        return response()->json([
            'status'    => 1,
            'message'   => 'Đã thêm mới thành công!',
        ]);
    }

    public function destroy(Request $request)
    {
        $Quyen = Quyen::where('id', $request->id)->first();
        if($Quyen) {
            $Quyen->delete();
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
        $Quyen = Quyen::where('id', $request->id)->first();
        if($Quyen) {
            $Quyen->update($request->all());
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
}
