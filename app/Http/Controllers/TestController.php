<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\DanhGia;
use App\Models\Tours;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function view()
    {


        return view('admin.share.master');
    }

    public function index()
    {
        $data = Tours::where('trang_thai', 1)->orderByDESC('don_gia')->get();
        $listConfig = Config::orderByDESC('id')->take(9)->get();
        $config = Config::orderByDESC('id')->first();
        $slide = explode(",", $config->slide);
        $danhGia = DanhGia::join('khach_hang', 'khach_hang.id', 'danh_gia.id_khach_hang')
                        ->join('tours', 'tours.id', 'danh_gia.id_tour')
                        ->where('danh_gia.trang_thai', 1)
                        ->orderByDESC('id')
                        ->select('danh_gia.*', 'khach_hang.ho_va_ten', 'tours.ten_tour')
                        ->take(10)->get();


        return view('client.share.master',compact('data', 'listConfig', 'slide', 'danhGia'));

    }

}
