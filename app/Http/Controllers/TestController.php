<?php

namespace App\Http\Controllers;

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

        return view('client.share.master',compact('data'));

    }

}
