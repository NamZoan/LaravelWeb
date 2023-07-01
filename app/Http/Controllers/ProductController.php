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

class ProductController extends Controller
{
    public function add()
    {
        $category = DB::table('tbl_category')->get();
        $brand = DB::table('tbl_brand')->get();
        return view('admin.addproduct')->with('category', $category)->with('brand', $brand);
    }
    public function all()
    {   
        $allproduct = DB::table('tbl_category')
            ->join('tbl_product', 'tbl_category.category_id', '=', 'tbl_product.category_id')
            ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
            ->select('tbl_category.category_name', 'tbl_brand.brand_name', 'tbl_product.*')
            ->get();
        return view('admin/allproduct', ['allproduct' => $allproduct]);
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
    public function save_product(Request $request)
    {
        $data = array();
        $currentTime = Carbon::now();
        $formattedDateTime = $currentTime->toDateTimeString();
        $data['product_name'] = $request->product_name;
        $data['product_desc'] = $request->product_desc;
        $data['product_price'] = $request->product_price;
        $data['category_id'] = $request->category_id;
        $data['brand_id'] = $request->brand_id;
        $data['created_at']=$formattedDateTime;

        $image = $request->file('product_imge');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('img-product'), $imageName);
        $data['product_imge'] = $imageName;
        DB::table('tbl_product')->insert($data);
        Session::put('message', 'Bạn Đã Thêm Thành Công Sản Phẩm!');
        return Redirect::to('/allproduct');
    }
    public function edit_product($product_id)
    {
        $category = DB::table('tbl_category')->get();
        $brand = DB::table('tbl_brand')->get();
        $edit_product = DB::table('tbl_product')->where('product_id', $product_id)->first();
        return view('admin/update_product', ["edit_product" => $edit_product])->with('category', $category)->with('brand', $brand);
    }

    public function update_product(Request $request, $product_id)
    {
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_desc'] = $request->product_desc;
        $data['product_price'] = $request->product_price;
        $data['category_id'] = $request->category_id;
        $data['brand_id'] = $request->brand_id;

        $image = $request->file('product_imge');
        if ($image) {
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img-product'), $imageName);
            $data['product_imge'] = $imageName;
            DB::table('tbl_product')->where('product_id', $product_id)->update($data);
            return Redirect::to('allproduct');
        } else {
            DB::table('tbl_product')->where('product_id', $product_id)->update($data);
            return Redirect::to('allproduct');
        }
    }

    public function delete_product($product_id)
    {
        DB::table('tbl_product')->where('product_id', $product_id)->delete();
        Session::put('Thông Báo', 'Xóa Sản Phẩm Thành Công');
        return Redirect::to('allproduct');
    }
}
