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
use PhpParser\Node\Stmt\TryCatch;

session_start();

class CategoryProduct extends Controller
{
    public function add()
    {
        return view('admin/addcategory');
    }
    public function all()
    {
        $allcategory = DB::table('tbl_category')->get();
        return view('admin/allcategory', ['allcategory' => $allcategory]);
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
    public function save_category(Request $request)
    {
        $currentTime = Carbon::now();
        $formattedDateTime = $currentTime->toDateTimeString();
        $name = $request->input('name_category');
        $des = $request->input('desc_category');
        $data = array('category_name' => $name, "category_desc" => $des, 'created_at' => $formattedDateTime);
        DB::table('tbl_category')->insert($data);
        Session::put('message', 'Bạn Đã Thêm Thành Công Danh Mục!');
        return Redirect::to('/allcategory');
    }
    public function edit_category($category_id)
    {
        $edit_category = DB::table('tbl_category')->where('category_id', $category_id)->first();
        return view('admin/update_category', ["edit_category" => $edit_category]);
    }

    public function update_category(Request $request, $category_id)
    {
        $name = $request->input('category_name');
        $desc = $request->input('category_desc');
        DB::update('update tbl_category set category_name = ? ,category_desc = ? where category_id = ?', [$name, $desc, $category_id]);
        return Redirect::to('allcategory');
    }
    public function delete_category($category_id)
    {
        $test = DB::table('tbl_product')->where('category_id', $category_id)->get();

        try {
            DB::table('tbl_category')->where('category_id', $category_id)->delete();
            Session::put('message', 'Xóa Danh Mục Thành Công');
            return Redirect::to('allcategory');
        } catch (\Throwable $th) {
            Session::put('message', 'Trong Danh Mục Còn Sản Phẩm');
            return Redirect::to('allcategory');
        }
    }
}
