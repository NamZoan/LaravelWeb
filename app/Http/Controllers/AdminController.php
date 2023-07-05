<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

session_start();

class AdminController extends Controller
{

    public function login()
    {
        return view('admin/login');
    }
    public function showdashboard()
    {
        $all_order = DB::table('tbl_order')
            ->join('tbl_shoppingcustomer', 'tbl_shoppingcustomer.shoppingcustomer_id', '=', 'tbl_order.shoppingcustomer_id')
            ->where('tbl_order.order_status', '=',"Chờ Xác Nhận Đơn Hàng")
            ->get();
        return view('admin/dashboard', ["all_order" => $all_order]);
    }
    public function orderdetail($orderID)
    {
        $data = DB::table('tbl_shoppingcustomer')
            ->join('tbl_order', 'tbl_shoppingcustomer.shoppingcustomer_id', '=', 'tbl_order.shoppingcustomer_id')
            ->join('tbl_order_detail', 'tbl_order.order_id', '=', 'tbl_order_detail.order_id')
            ->join('tbl_payment', 'tbl_order.payment_id', '=', 'tbl_payment.payment_id')
            ->where('tbl_order.order_id', '=', $orderID)
            ->first();

        $arr = DB::table('tbl_shoppingcustomer')
            ->join('tbl_order', 'tbl_shoppingcustomer.shoppingcustomer_id', '=', 'tbl_order.shoppingcustomer_id')
            ->join('tbl_order_detail', 'tbl_order.order_id', '=', 'tbl_order_detail.order_id')

            ->where('tbl_shoppingcustomer.shoppingcustomer_id', '=', $data->shoppingcustomer_id)
            ->get();
        return view('admin/orderdetail', ["arr" => $arr], ["data" => $data]);
    } 
    public function dashboard(Request $request)
    {
        $ad_email = $request->ad_email;
        $ad_password = $request->ad_password;
        $result = DB::table('tbl_admin')->where('ad_email', $ad_email)->where('ad_password', $ad_password)->first();
        if ($result) {
            Session::put('ad_name', $result->ad_name);
            Session::put('ad_id', $result->ad_id);
            return Redirect::to('/dashboard');
        } else {
            Session::put('message', 'Tài Khoản Hoặc Mật Khẩu Sai');
            return Redirect::to('/login');
        }
    }
    public function logout()
    {
        Session::put('ad_name', null);
        Session::put('ad_id', null);
        return Redirect::to('/login');
    }
}
