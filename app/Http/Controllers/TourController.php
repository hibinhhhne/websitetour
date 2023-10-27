<?php

namespace App\Http\Controllers;

use App\Http\Requests\TourRequest;
use App\Models\Tours;
use Illuminate\Http\Request;

class TourController extends Controller
{
    public function index()
    {
        $data = Tours::get();

        return view('admin.page.tours.index', compact('data'));
    }

    public function data()
    {
        $Tours = Tours::all();

        return response()->json([
            'data'  => $Tours,
        ]);
    }

    public function store(TourRequest $request)
    {
        $data  = $request->all();
        Tours::create($data);

        return response()->json([
            'status'    => true,
        ]);

    }
    public function update(TourRequest $request)
    {
        $Tours = Tours::where('id', $request->id)->first();

        $Tours->update($request->all());

        return response()->json(['status' => true]);
    }

    public function destroy(TourRequest $request)
    {
        $Tours = Tours::where('id', $request->id)->first();
        if($Tours) {
            $Tours->delete();
            return response()->json(['status' => true]);
        }
        return response()->json(['status' => false]);

    }

    public function changeStatus(TourRequest $request)
    {
        $Tours = Tours::find($request->id);
        if($Tours) {
            $Tours->trang_thai = !$Tours->trang_thai;
            $Tours->save();
            return response()->json(['status' => true]);
        }
        return response()->json(['status' => false]);

    }
    public function viewDetailTour($id)
    {
        return view('client.page.detail_tour');
    }

    public function getDataTour(Request $request)
    {
        $list = Tours::where('trang_thai', 1)->get();
        return response()->json([
            'list'  => $list
        ]);
    }

    public function viewListTour()
    {
        $data = Tours::where('trang_thai', 1)->get();

        return view('client.share.master', compact('data'));
    }

    public function getDataDetailTour(Request $request)
    {
        $tourData = Tours::find($request->id);
        if($tourData) {
            return response()->json([
                'status'    => true,
                'data'      => $tourData,
            ]);
        } else {
            return response()->json([
                'status'    => false,
                'data'      => 'Tour không tồn tại',
            ]);
        }
        // $tourData = Tours::join('chi_tiet_tour', 'tours.id', '=', 'chi_tiet_tour.id_tour')
        //     ->select('tours.*', 'chi_tiet_tour.*')
        //     ->where('tours.id', $tourId)
        //     ->get();


    }
}
