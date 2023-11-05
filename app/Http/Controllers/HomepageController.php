<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use App\Models\QuocTich;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomepageController extends Controller
{
    public function indexLoginRegister()
    {
        return view('client.page.register_login');
    }

    public function actionRegister(Request $request){
        $data = $request->all();

        $data['password'] = bcrypt($data['password']);
        //gửi email kích hoạt tài khoản
        $data['loai_tai_khoan'] = 1;//viết tạm
        KhachHang::create($data);

        return response()->json([
            'status' => 1
        ]);
    }

    public function getDataQuocTich()
    {
        $data = QuocTich::get();

        return response()->json([
            'data' => $data
        ]);
    }

    public function actionLogin(Request $request) {
        $data = $request->all();
        $check = Auth::guard('client')->attempt(
            [
                "email"     => $data['email'],
                "password" => $data['password']
            ]
        );
        if($check) {
            //đúng
            return response()->json([
                'status' => 1,
                'message'   => "Đã login thành công!"
            ]);
        } else {
            //sai
            return response()->json([
                'status' => 0,
                'message'   => "Mật khẩu hoặc email không chính xác!"
            ]);
        }
    }

    public function actionLogout()
    {
        Auth::guard('client')->logout();
        toastr()->success("Tài khoản đã đăng xuất!");
        return redirect('/');
    }
}
