<?php

namespace App\Http\Controllers;

use App\Http\Requests\DatHangRequest;
use App\Http\Requests\TourRequest;
use App\Models\DonHang;
use App\Models\GioHang;
use App\Models\Tours;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TourController extends Controller
{
    public function indexTour()
    {
        return view('client.page.tour');
    }

    public function indexCheckout()
    {
        return view('client.page.checkout');
    }

    public function addToCart(Request $request)
    {
        $data = $request->all();
        $khach_hang = Auth::guard('client')->user();
        $check_user = Auth::guard('client')->check();

        if ($check_user) {
            $check      = GioHang::where('id_tour', $data['id'])
                                ->where('tinh_trang', 0)
                                ->where('id_khach_hang', $khach_hang->id)
                                ->first();
            if ($check) {
                $check->so_luong = $check->so_luong + $data['so_luong_mua'];
                $check->thanh_tien = $check->so_luong * $check->don_gia;
                $check->save();
            } else {
                GioHang::create([
                    'id_tour'           => $data['id'],
                    'id_khach_hang'     => $khach_hang->id,
                    'don_gia'           => $data['don_gia'],
                    'so_luong'          => 1,
                    'thanh_tien'        => $data['don_gia'] * 1,
                    'tinh_trang'        => 0,
                ]);
            }

            return response()->json([
                'status'    => 1,
                'message'   => 'Đã thêm vào giỏ hàng',
            ]);
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Yêu cầu login',
            ]);
        }


    }

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

        return view('client.page.tour_list', compact('data'));
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

    public function datHang(DatHangRequest $request)
    {
        $nguoi_login    =   Auth::guard('client')->user();
        if($nguoi_login) {
            $donHang = DonHang::create([
                'id_khach_hang'     =>  $nguoi_login->id,
                'dia_chi'           =>  $request->dia_chi,
                'ten_nguoi_nhan'    =>  $request->ten_nguoi_nhan,
                'email'             =>  $request->email,
                'so_dien_thoai'     =>  $request->so_dien_thoai
            ]);

            $donHang->ma_don_hang   =   140823 + $donHang->id;
            $donHang->tong_tien     =   $request->tong_tien;
            $donHang->save();

            foreach($request->ds_dh as $key => $value) {
                $gio_hang = GioHang::find($value['id']);
                $gio_hang->id_don_hang  = $donHang->ma_don_hang;
                $gio_hang->tinh_trang   = \App\Models\GioHang::DANG_CHO_THANH_TOAN;
                $gio_hang->save();
            }

            $xxx['ho_va_ten']        =  $nguoi_login->ho_va_ten;
            $xxx['ds_sh']	         =  $request->ds_sh;
            $xxx['tong_tien']        =  $request->tong_tien;
            $xxx['noi_dung_ck']		 =  'DHT' . $donHang->ma_don_hang;


            return response()->json([
                'status'    => 1,
                'message'   => 'Đã đặt đơn hàng thành công!',
            ]);

        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Chức năng này yêu cầu phải đăng nhập',
            ]);
        }
    }
}
