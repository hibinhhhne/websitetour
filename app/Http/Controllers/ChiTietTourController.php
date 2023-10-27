<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChiTietTourRequest;
use App\Models\ChiTietTour;
use Illuminate\Http\Request;

class ChiTietTourController extends Controller
{
    public function index()
    {
        $data = ChiTietTour::get();

        return view('admin.page.chi_tiet_tour.index', compact('data'));
    }

    public function data()
    {
        $chitietTour = ChiTietTour::all();

        return response()->json([
            'data'  => $chitietTour,
        ]);
    }

    public function store(ChiTietTourRequest $request)
    {
        $data  = $request->all();
        ChiTietTour::create($data);

        return response()->json([
            'status'    => true,
        ]);

    }
    public function update(ChiTietTourRequest $request)
    {
        $chitietTour = ChiTietTour::where('id', $request->id)->first();

        $chitietTour->update($request->all());

        return response()->json(['status' => true]);
    }

    public function destroy(ChiTietTourRequest $request)
    {
        $chitietTour = ChiTietTour::where('id', $request->id)->first();
        if($chitietTour) {
            $chitietTour->delete();
            return response()->json(['status' => true]);
        }
        return response()->json(['status' => false]);

    }

    public function changeStatus(ChiTietTourRequest $request)
    {
        $chitietTour = ChiTietTour::find($request->id);
        if($chitietTour) {
            $chitietTour->trang_thai = !$chitietTour->trang_thai;
            $chitietTour->save();
            return response()->json(['status' => true]);
        }
        return response()->json(['status' => false]);

    }
}
