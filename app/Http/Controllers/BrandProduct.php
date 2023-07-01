<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\News;
use App\Http\Requests;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;

session_start();

class BrandProduct extends Controller
{
    public function add()
    {
        return view('admin/addbrand');
    }
    public function all()
    {
        $allbrand = DB::table('tbl_brand')->get();
        return view('admin/allbrand', ['allbrand' => $allbrand]);
    }
    public function dash()
    {
        return view('admin/dashboard');
    }
    public function logout()
    {
        Session::put('ad_name', null);
        Session::put('ad_id', null);
        return Redirect::to('/login');
    }
    public function save_brand(Request $request)
    {
        $currentTime = Carbon::now();
        $formattedDateTime = $currentTime->toDateTimeString();
        $name = $request->input('name_brand');
        $des = $request->input('desc_brand');
        $data = array('brand_name' => $name, "brand_desc" => $des, "created_at" => $formattedDateTime);
        DB::table('tbl_brand')->insert($data);
        Session::put('message', 'Bạn Đã Thêm Thành Công Thương Hiệu!');
        return Redirect::to('/allbrand');
    }
    public function edit_brand($brand_id)
    {
        $edit_brand = DB::table('tbl_brand')->where('brand_id', $brand_id)->first();
        return view('admin/update_brand', ["edit_brand" => $edit_brand]);
    }

    public function update_brand(Request $request, $brand_id)
    {
        $name = $request->input('brand_name');
        $desc = $request->input('brand_desc');
        DB::update('update tbl_brand set brand_name = ? ,brand_desc = ? where brand_id = ?', [$name, $desc, $brand_id]);
        return Redirect::to('allbrand');
    }
    public function delete_brand($brand_id)
    {
        $test = DB::table('tbl_product')->where('brand_id', $brand_id)->get();
        try {
            DB::table('tbl_brand')->where('brand_id', $brand_id)->delete();
            Session::put('Thông Báo', 'Xóa Danh Mục Thành Công');
            return Redirect::to('allbrand');
        } catch (\Throwable $th) {
            Session::put('message', 'Trong Thương Hiệu Còn Sản Phẩm');
            return Redirect::to('allbrand');
        }
    }
}
