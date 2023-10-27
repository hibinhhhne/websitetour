<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChucNangRequest;
use App\Models\ChucNang;
use Illuminate\Http\Request;

class ChucNangController extends Controller
{
    public function index()
    {
        $data = ChucNang::get();

        return view('admin.page.chuc_nang.index', compact('data'));
    }

    public function data()
    {
        $chucNang = ChucNang::all();

        return response()->json([
            'data'  => $chucNang,
        ]);
    }

    public function store(ChucNangRequest $request)
    {
        $data  = $request->all();
        ChucNang::create($data);

        return response()->json(['status' => true]);
    }

    public function destroy(Request $request)
    {
        $chucNang = ChucNang::where('id', $request->id)->first();
        if($chucNang) {
            $chucNang->delete();
            return response()->json(['status' => true]);
        }
        return response()->json(['status' => false]);
    }
}
