<?php

namespace App\Http\Controllers;

use App\Http\Requests\KhachSanRequest;
use App\Models\KhachSan;
use Illuminate\Http\Request;

class KhachSanController extends Controller
{
    public function index()
    {
        $data = KhachSan::get();

        return view('admin.page.khach_san.index', compact('data'));
    }

    public function data()
    {
        $khachSan = KhachSan::all();

        return response()->json([
            'data'  => $khachSan,
        ]);
    }

    public function store(KhachSanRequest $request)
    {
        $data  = $request->all();
        KhachSan::create($data);

        return response()->json(['status' => true]);
    }

    public function destroy(Request $request)
    {
        $khachSan = KhachSan::where('id', $request->id)->first();
        if($khachSan) {
            $khachSan->delete();
            return response()->json(['status' => true]);
        }
        return response()->json(['status' => false]);
    }
    public function changeStatus(KhachSanRequest $request)
    {
        $khachSan = KhachSan::find($request->id);
        if($khachSan) {
            $khachSan->trang_thai = !$khachSan->trang_thai;
            $khachSan->save();
            return response()->json(['status' => true]);
        }
        return response()->json(['status' => false]);
    }

    public function update(KhachSanRequest $request){
        $khachSan = KhachSan::where('id', $request->id)->first();
        if($khachSan) {
            $khachSan->update($request->all());
            return response()->json(['status' => true]);
        }
        return response()->json(['status' => false]);
    }
}
