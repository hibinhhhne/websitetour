<?php

namespace App\Http\Controllers;

use App\Models\GioHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonHangController extends Controller
{
    public function dataListCart()
    {
        $user = Auth::guard('client')->user();
        $data = GioHang::where('id_khach_hang', $user->id)
                        ->where('tinh_trang',0)
                        ->join('tours', 'tours.id', 'gio_hangs.id_tour')
                        ->select('gio_hangs.id', 'gio_hangs.don_gia', 'gio_hangs.so_luong', 'gio_hangs.thanh_tien', 'tours.ten_tour', 'tours.hinh_anh', 'gio_hangs.id_tour')
                        ->groupBy('gio_hangs.id', 'gio_hangs.don_gia', 'gio_hangs.so_luong', 'gio_hangs.thanh_tien', 'tours.ten_tour', 'tours.hinh_anh', 'gio_hangs.id_tour')
                        ->get();
        $total = 0;
        foreach ($data as $value) {
            $total += $value->thanh_tien;
        }
        return response()->json([
            'data'   => $data,
            'total'   => $total,
        ]);
    }
}
