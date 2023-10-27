<?php

namespace App\Http\Controllers;

use App\Http\Requests\DiadiemRequest;
use App\Models\Diadiem;
use App\Models\TinhThanh;
use Illuminate\Http\Request;

class DiadiemController extends Controller
{
    public function index()
    {
        $TinhThanh = TinhThanh::all();

        return view('admin.page.dia_diem_tham_quan.index', compact('TinhThanh'));
    }

    public function data()
    {
        $Diadiem = Diadiem::all();

        return response()->json([
            'data'  => $Diadiem,
        ]);
    }

    public function store(Request $request) //chỉnh ở đây r
    {
        $data  = $request->all();
        Diadiem::create($data);

        return response()->json(['status' => true]);
    }

    public function destroy(Request $request)
    {
        $Diadiem = Diadiem::where('id', $request->id)->first();
        if($Diadiem) {
            $Diadiem->delete();
            return response()->json(['status' => true]);
        }
        return response()->json(['status' => false]);
    }
}
