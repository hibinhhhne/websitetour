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

        return response()->json(['status' => true]);
    }

    public function destroy(Request $request)
    {
        $Quyen = Quyen::where('id', $request->id)->first();
        if($Quyen) {
            $Quyen->delete();
            return response()->json(['status' => true]);
        }
        return response()->json(['status' => false]);
    }
}
