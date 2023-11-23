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

class PaymentController extends Controller
{
    public function vnpay(Request $request)
    {
        $nguoi_login    =   Auth::guard('client')->user();
        $check = DB::table('hoa_don')->where('id_khach_hang',$nguoi_login->id)->where('trang_thai_thanh_toan',1)->first();
        $sale = false;
        if($check){
            $sale = true;
        }
        if($sale){
            $request->tong_tien = (int) $request->tong_tien * 0.9;
        }
        $randomNumber = "";
        for ($i = 0; $i < 8; $i++) {
            $randomNumber .= rand(0, 9);
        }
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('payment.vnpay.return',['code_return' => 'order_'.$randomNumber]);

        // sua theo cau hinh trong mail
        $vnp_TmnCode = "4FFLYGSW";
        $vnp_HashSecret = "JBDUWLPWEBBGUPIFTBETCOFWACVINLPW";

        //
        $vnp_TxnRef = 'order_'.$randomNumber;  // Mã đơn hàng;
        $vnp_OrderInfo = 'Thanhs toán đặt tour'; // Noi dung thanh toan;
        $vnp_OrderType = "Thanh toán dịch vụ ";
        $vnp_Amount = $request->tong_tien * 100;
        $vnp_Locale = "VN";
        $vnp_BankCode = "NCB";
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
//        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
//            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
//        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
                            , 'message' => 'success'
                            , 'data' => $vnp_Url);
//        if (isset($_POST['redirect'])) {
//            header('Location: ' . $vnp_Url);
//            die();
//        } else {
//            echo json_encode($returnData);
//        }
        return response()->json($returnData);
//        header('Location: ' . $vnp_Url);

//        die();


    }

    public function vnpayReturn(Request $request){
        $code = $request->code_return;
        $user = Auth::guard('client')->user();
        $carts = GioHang::where('id_khach_hang', $user->id)->get();
        $check = DB::table('hoa_don')->where('id_khach_hang',$user->id)->where('trang_thai_thanh_toan',1)->first();
        $sale = false;
        if($check){
            $sale = true;
        }

        foreach ($carts as $cart) {
            $tour = Tours::find($cart->id_tour);
            $tour->so_nguoi = $tour->so_nguoi - ($cart->so_luong + $cart->so_luong_2);
            $tour->save();
            if($sale){
                $cart->thanh_tien = (int)  $cart->thanh_tien * 0.9;
            }
            $model_id = DB::table('hoa_don')->insertGetId([
                'id_tour'                   =>  $cart->id_tour,
                'id_khach_hang'             =>  $user->id,
                'id_nhan_vien'              =>  1,
                'khuyen_mai'                =>  0,
                'ghi_chu'                   =>  '',
                'ngay_bat_dau'              =>  $tour->ngay_khoi_hanh,
                'ngay_ket_thuc'             =>  '',
                'so_nguoi'                  =>  $cart->so_luong + $cart->so_luong_2,
                'tong_tien'                 =>  $cart->thanh_tien,
                'trang_thai_thanh_toan'     =>  1,
                'ma_thanh_toan'             =>  $code,
                'id_bill_thanh_toan'        =>  0,
                'created_at'                =>  date('Y-m-d H:i:s'),
                'updated_at'                =>  date('Y-m-d H:i:s'),
            ]);
            DB::table('gio_hangs')->where('id', $cart->id)->delete();
            $hoa_don = DB::table('hoa_don')->where('id', $model_id)->first();
            $tour = DB::table('tours')->where('id', $hoa_don->id_tour)->first();
            $responseData = [
                'name' => $user->ho_va_ten,
                'tour' => $tour->ten_tour,
                'so_nguoi' => $hoa_don->so_nguoi,
                'tong_tien' => $hoa_don->tong_tien,
                'ngay_bat_dau' => $hoa_don->ngay_bat_dau,
            ];
            Mail::to($user->email)->send(new PaymentMail($responseData));
        }

        return redirect()->route('home');
    }

}
