<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\DanhGia;
use App\Models\Tours;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $tour = DB::table('tinh_thanh')->get();


        $list_anh = explode(",", $listConfig[0]['images']);
        $danhGia = DanhGia::join('khach_hang', 'khach_hang.id', 'danh_gia.id_khach_hang')
                        ->join('tours', 'tours.id', 'danh_gia.id_tour')
                        ->where('danh_gia.trang_thai', 1)
                        ->orderByDESC('id')
                        ->select('danh_gia.*', 'khach_hang.ho_va_ten', 'tours.ten_tour')
                        ->take(10)->get();

<<<<<<< HEAD

        return view('client.share.master',compact('data', 'listConfig', 'slide', 'danhGia', 'tour'));
=======
        return view('client.share.master',compact('data', 'list_anh', 'slide', 'danhGia'));
>>>>>>> 52b4dce9bd899d69f9a0f3367dd6d309859a24bb

    }

    public function indexLienHe()
    {
        return view();
    }

}
