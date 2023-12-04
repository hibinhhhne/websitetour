<?php

namespace App\Http\Controllers;

use App\Http\Requests\DatHangRequest;
use App\Http\Requests\TourRequest;
use App\Mail\ForgotEmail;
use App\Mail\OrderMail;
use App\Mail\PaymentMail;
use App\Models\DonHang;
use App\Models\GioHang;
use App\Models\Tours;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redis;

class TourController extends Controller
{
    public function indexTour()
    {
        return view('client.page.tour');
    }

    public function indexCheckout()
    {
        $khach_hang = Auth::guard('client')->user();
        $check_user = Auth::guard('client')->check();
        $check = DB::table('hoa_don')->where('id_khach_hang',$khach_hang->id)->where('trang_thai_thanh_toan',1)->first();
        $sale = false;
        if($check){
            $sale = true;
        }
        return view('client.page.checkout',[
            'sale' => $sale
        ]);
    }

    public function addToCart(Request $request)
    {
        $data = $request->all();
        $khach_hang = Auth::guard('client')->user();
        $check_user = Auth::guard('client')->check();
        $soluongmua = (int)$data['so_luong_mua_1'] + (int)$data['so_luong_mua_2'];
        if($soluongmua > $data['so_nguoi']){
            return response()->json([
                'status'    => false,
                'message'   => 'Số lượng vé bán của tour chỉ còn '. $data['so_nguoi'].' vé !',
            ]);
        }
        if ($check_user) {
            $check      = GioHang::where('id_tour', $data['id'])
                                ->where('tinh_trang', 0)
                                ->where('id_khach_hang', $khach_hang->id)
                                ->first();
            if ($check) {
                $check->so_luong = $check->so_luong + $data['so_luong_mua_1'];
                $check->so_luong_2 = $check->so_luong_2 + $data['so_luong_mua_2'];
                $money = (int)$data['don_gia']  * $check->so_luong + (int)$data['don_gia_2'] *  $check->so_luong_2;
                $check->thanh_tien = $money;
                $check->start_date = $data['start_date'] ?? null;
                $check->save();
            } else {
                $money = (int)$data['don_gia']  * (int)$data['so_luong_mua_1'] + (int)$data['don_gia_2'] *  (int)$data['so_luong_mua_2'];
                GioHang::create([
                    'id_tour'           => $data['id'],
                    'id_khach_hang'     => $khach_hang->id,
                    'don_gia'           => $money,
                    'so_luong'          => $data['so_luong_mua_1'],
                    'so_luong_2'        => $data['so_luong_mua_2'],
                    'thanh_tien'        => $money,
                    'tinh_trang'        => 0,
                    'start_date'        => $data['start_date'] ?? null,
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

    public function confirm(Request $request){
        $user = Auth::guard('client')->user();
        if($user == null){
            return redirect()->route('login');
        }
        $id = $request->data;

        $data = DB::table('tokens')->where('token', $id)->first();
        if($data == null){
            return redirect()->route('home');
        }
        $model_id = $data->model_id;
        DB::table('hoa_don')->where('id', $model_id)->update([
            'trang_thai_thanh_toan' => 1,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        $hoa_don = DB::table('hoa_don')->where('id', $model_id)->first();
        $user2 = DB::table('khach_hang')->where('id', $hoa_don->id_khach_hang)->first();
        $tour = DB::table('tours')->where('id', $hoa_don->id_tour)->first();
        $responseData = [
            'name' => $user2->ho_va_ten,
            'tour' => $tour->ten_tour,
            'so_nguoi' => $hoa_don->so_nguoi,
            'tong_tien' => $hoa_don->tong_tien,
            'ngay_bat_dau' => $hoa_don->ngay_bat_dau,
        ];

        // Gửi email
        Mail::to($user2->email)->send(new PaymentMail($responseData));

        DB::table('tokens')->where('token', $id)->delete();
        return redirect()->route('home');

    }

    public function index()
    {
        $data = Tours::get();
        $hotel = DB::table('khach_san')->get();
        $place = DB::table('dia_diem')->get();
        $vehicle = DB::table('phuong_tien')->get();

        return view('admin.page.tours.index', [
            'data' => $data,
            'hotel' => $hotel,
            'place' => $place,
            'vehicle' => $vehicle,
        ]);
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
        $data['hinh_anh'] = $request->hinh_anh ?? null;
        Tours::create($data);
        return response()->json([
            'status'    => 1,
            'message'   => 'Đã thêm mới thành công!',
        ]);

    }
    public function update(Request $request)
    {
        $Tours = Tours::where('id', $request->id)->first();

        $Tours->update($request->all());

        return response()->json([
            'status'    => 1,
            'message'   => 'Đã cập nhật thành công!',
        ]);
    }

    public function destroy(Request $request)
    {
        $Tours = Tours::where('id', $request->id)->first();
        if($Tours) {
            $Tours->delete();
            return response()->json([
                'status'    => 1,
                'message'   => 'Đã xóa thành công!',
            ]);
        }
        return response()->json([
            'status'    => 0,
            'message'   => 'Đã gặp lỗi!',
        ]);

    }

    public function changeStatus(Request $request)
    {
        $Tours = Tours::find($request->id);
        if($Tours) {
            $Tours->trang_thai = !$Tours->trang_thai;
            $Tours->save();
            return response()->json([
                'status'    => 1,
                'message'   => 'Đã đổi trạng thái thành công!',
            ]);
        }
        return response()->json([
            'status'    => 0,
            'message'   => 'Đã gặp lỗi gì đó!',
        ]);

    }
    public function viewDetailTour($id)
    {
        return view('client.page.detail_tour');
    }

    public function deleteTour($id)
    {
        $user = Auth::guard('client')->user();

        GioHang::query()->where('id_khach_hang',$user->id)->where('id_tour',$id)->delete();
        return redirect()->back();
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
        $timestamp = strtotime($tourData->ngay_khoi_hanh);
        $tourData->format_day = date('d/m/Y', $timestamp);
        $tourData->khach_san = DB::table('khach_san')->where('id', $tourData->id_khach_san)->first()->ten_khach_san ?? 'chưa xác định';
        $tourData->phuong_tien = DB::table('phuong_tien')->where('id', $tourData->id_phuong_tien)->first()->ten_phuong_tien ?? 'chưa xác định';
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
        $check = DB::table('hoa_don')->where('id_khach_hang',$nguoi_login->id)->where('trang_thai_thanh_toan',1)->first();
        $sale = false;
        if($check){
            $sale = true;
        }
        if($nguoi_login) {

            foreach($request->ds_dh as $key => $value) {
                $tour = Tours::find($value['id_tour']);
                if($value['so_luong'] > $tour->so_nguoi) {
                    return response()->json([
                        'status'    => 0,
                        'message'   => $tour->ten_tour . ' chỉ còn lại ' . $tour->so_nguoi . '  chỗ'
                    ]);
                }
                $token = Str::random(10);


                $responseData = [
                    'name' => $nguoi_login->ho_va_ten,
                    'link' => route('confirmOrder',['data'=>$token]),
                ];

                // Gửi email
                Mail::to($request->email)->send(new OrderMail($responseData));
                if($sale){
                    $value['thanh_tien'] = (int) $value['thanh_tien'] * 0.9;
                }
                $idDon = DB::table('hoa_don')->insertGetId([
                    'id_tour'                   =>  $value['id_tour'],
                    'id_khach_hang'             =>  $nguoi_login->id,
                    'id_nhan_vien'              =>  1,
                    'khuyen_mai'                =>  0,
                    'ghi_chu'                   =>  '',
                    'ngay_bat_dau'              =>  $tour->ngay_khoi_hanh,
                    'ngay_ket_thuc'             =>  '',
                    'so_nguoi'                  =>  $value['so_luong'],
                    'tong_tien'                 =>  $value['thanh_tien'],
                    'trang_thai_thanh_toan'     =>  0,
                    'ma_thanh_toan'             =>   $token,
                    'id_bill_thanh_toan'        =>  0,
                    'created_at'                =>  date('Y-m-d H:i:s'),
                    'updated_at'                =>  date('Y-m-d H:i:s'),
                ]);
                DB::table('tokens')->insert([
                    'token' => $token,
                    'user_id' => $nguoi_login->id,
                    'model_id' => $idDon,
                ]);

                DB::table('gio_hangs')->where('id_tour', $value['id_tour'])->where('id_khach_hang', $nguoi_login->id)->delete();

            }
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
