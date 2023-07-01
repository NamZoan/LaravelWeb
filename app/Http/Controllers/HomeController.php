<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\News;
use App\Http\Requests;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function index()
    {

        $pro = DB::table('tbl_product')
            ->orderBy('product_id', 'desc')
            ->skip(1)
            ->take(2)
            ->get();

        $product = DB::select("SELECT * FROM tbl_product ORDER BY product_id DESC LIMIT 6");
        $category = DB::table('tbl_category')->get();
        $brand = DB::table('tbl_brand')->get();

        $product_new = DB::select("SELECT * FROM tbl_product ORDER BY product_id DESC LIMIT 1");

        return view('client/welcome')
            ->with('category', $category)
            ->with('brand', $brand)
            ->with('product', $product)
            ->with('pro', $pro)
            ->with('product_new', $product_new);
    }

    public function show_brand_welcome($brand_id)
    {
        $pro = DB::table('tbl_product')
            ->orderBy('product_id', 'desc')
            ->skip(1)
            ->take(2)
            ->get();
        $product_new = DB::select("SELECT * FROM tbl_product ORDER BY product_id DESC LIMIT 1");

        $edit_brand = DB::table('tbl_brand')->where('brand_id', $brand_id)->first();
        $brand_product = DB::table('tbl_product')
            ->join('tbl_brand', 'tbl_brand.brand_id', '=', 'tbl_product.brand_id')
            ->where('tbl_product.brand_id', '=', $brand_id)
            ->get();
        $category = DB::table('tbl_category')->get();
        $brand = DB::table('tbl_brand')->get();
        return view('client/brand')->with('product_new', $product_new)->with('pro', $pro)
            ->with('category', $category)->with('brand', $brand)->with('category_product', $brand_product)->with('edit_brand', $edit_brand);
    }
    public function show_category_welcome($category_id)
    {
        $pro = DB::table('tbl_product')
            ->orderBy('product_id', 'desc')
            ->skip(1)
            ->take(2)
            ->get();
        $product_new = DB::select("SELECT * FROM tbl_product ORDER BY product_id DESC LIMIT 1");

        $edit_category = DB::table('tbl_category')->where('category_id', $category_id)->first();
        $category_product = DB::table('tbl_product')
            ->join('tbl_category', 'tbl_category.category_id', '=', 'tbl_product.category_id')
            ->where('tbl_product.category_id', '=', $category_id)
            ->get();

        $category = DB::table('tbl_category')->get();
        $brand = DB::table('tbl_brand')->get();
        return view('client/category')->with('product_new', $product_new)->with('pro', $pro)
            ->with('category', $category)->with('brand', $brand)->with('category_product', $category_product)->with('edit_category', $edit_category);
    }
    public function detail_product($product_id)
    {
        $category = DB::table('tbl_category')->get();
        $brand = DB::table('tbl_brand')->get();

        $brand_product = DB::table('tbl_product')
            ->join('tbl_brand', 'tbl_brand.brand_id', '=', 'tbl_product.brand_id')
            ->where('tbl_product.product_id', '=', $product_id)
            ->first();

        $category_product = DB::table('tbl_product')
            ->join('tbl_category', 'tbl_category.category_id', '=', 'tbl_product.category_id')
            ->where('tbl_product.product_id', '=', $product_id)
            ->first();

        $detail_product = DB::table('tbl_category')
            ->join('tbl_product', 'tbl_category.category_id', '=', 'tbl_product.category_id')
            ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
            ->where('tbl_product.product_id', $product_id)
            ->first();
        return view('client/detailproduct')->with('detail_product', $detail_product)->with('brand_product', $brand_product)->with('category_product', $category_product)->with('category', $category)
            ->with('brand', $brand);
    }
    public function search_product(Request $request)
    {
        $pro = DB::table('tbl_product')
            ->orderBy('product_id', 'desc')
            ->skip(1)
            ->take(2)
            ->get();
        $product_new = DB::select("SELECT * FROM tbl_product ORDER BY product_id DESC LIMIT 1");

        $search = $request->input('search');
        $search_product = DB::table('tbl_product')->where('product_name', 'like', '%' . $search . '%')->get();
        $category = DB::table('tbl_category')->get();
        $brand = DB::table('tbl_brand')->get();
        return view('client/searchproduct')->with('product_new', $product_new)->with('pro', $pro)
            ->with('category', $category)->with('brand', $brand)->with('search_product', $search_product);
    }
}
