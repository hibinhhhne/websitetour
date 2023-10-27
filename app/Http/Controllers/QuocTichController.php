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

        return response()->json(['status' => true]);
    }

    public function destroy(Request $request)
    {
        $quocTich = QuocTich::where('id', $request->id)->first();
        if($quocTich) {
            $quocTich->delete();
            return response()->json(['status' => true]);
        }
        return response()->json(['status' => false]);

    }
}
