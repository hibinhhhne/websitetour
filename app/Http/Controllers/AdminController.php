<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Http\Requests\updateAdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {

        $data = Admin::get();

        return view('admin.page.admin.index', compact('data'));
    }

    public function data()
    {
        $Admin = Admin::get();
        // dd($Admin->toArray());
        return response()->json([
            'data'  => $Admin,
        ]);
    }

    public function store(AdminRequest $request)
    {
        $data  = $request->all();
        // dd($data);
        $data['password']       = bcrypt($request->password);
        Admin::create($data);

        return response()->json([
            'status' => true,
            'message'   => "Thêm mới thành công!",
        ]);
    }

    public function destroy(Request $request)
    {
        $Admin = Admin::where('id', $request->id)->first();
        if($Admin) {
            $Admin->delete();
            return response()->json([
                'status'    => 1,
                'message'   => 'Đã xóa thành công!',
            ]);
        }
        return response()->json(['status' => false]);
    }
    public function update(updateAdminRequest $request){
        $data = $request->all();
        // dd($data);
        $Admin = Admin::where('id',$request->id)->first();
        if($Admin){
            $Admin->update($data);
            return response()->json([
                'status' => true,
                'message'   => "Cập nhật thành công!",
            ]);
        }else{
            return response()->json([
                'status' => false,
                'message'   => "Không tồn tại!",
            ]);
        }
    }
}
