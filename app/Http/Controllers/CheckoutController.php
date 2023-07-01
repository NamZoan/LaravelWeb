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
use Gloudemans\Shoppingcart\Facades\Cart;
use Exception;

session_start();

class CheckoutController extends Controller
{
    public function login()
    {
        return view('client/login');
    }
    public function add_customer(Request $request)
    {
        $email = $request->input('customer_email');
        $data = array();
        $data['customer_name'] = $request->input('customer_name');
        $data['customer_email'] = $request->input('customer_email');
        $data['customer_password'] = $request->input('customer_password');
        $data['customer_phone'] = $request->input('customer_phone');
        $data['customer_address'] = $request->input('customer_address');

        $check = DB::table('tbl_customer')->where('customer_email', $email)->get();

        if (count($check) > 0) {
            Session::put('message_trung', 'Tài Khoản Của Bạn Bị Trùng');
            return Redirect('dang-nhap');
        } else {

            $customer_id = DB::table('tbl_customer')->insertGetId($data);
            Session::put('id', $customer_id);
            Session::put('message', "Tạo Tài Khoản Thành Công");

            return Redirect('dang-nhap');
        }
    }
    public function check_out()
    {
        return view('client/checkout');
    }
    public function logout()
    {
        Session::flush();
        return Redirect('dang-nhap');
    }
    public function check_login(Request $request)
    {
        $account = $request->input('account');
        $password = $request->input('password');
        $check = DB::table('tbl_customer')->where('customer_email', $account)->where('customer_password', $password)->first();
        if ($check) {
            Session::put('customer_id', $check->customer_id);
            Session::put('customer_name', $check->customer_name);
            Session::put('customer_email', $check->customer_email);
            Session::put('customer_phone', $check->customer_phone);
            Session::put('customer_address', $check->customer_address);
            return Redirect::to('welcome');
        } else {
            Session::put('message', "tài khoản hoặc mật khẩu sai");
            return view('client/login');
        }
    }

    public function update_customer(Request $request, $customer_id)
    {
        $password = $request->input('customer_password_old');
        $check = DB::table('tbl_customer')->where('customer_id', $customer_id)->where('customer_password', $password)->first();

        try {
            if ($password == $check->customer_password) {
                $data = array();
                $data['customer_name'] = $request->input('customer_name');
                $data['customer_email'] = $request->input('customer_email');
                $data['customer_password'] = $request->input('customer_password_new');
                $data['customer_phone'] = $request->input('customer_phone');
                $data['customer_address'] = $request->input('customer_address');

                $check = DB::table('tbl_customer')->where('customer_id', $customer_id)->update($data);
                Session::put('mess', 'Cập Nhật Thành Công');
                $cus = DB::table('tbl_customer')->where('customer_id', $customer_id)->first();

                Session::put('customer_id', $cus->customer_id);
                Session::put('customer_name', $cus->customer_name);
                Session::put('customer_email', $cus->customer_email);
                Session::put('customer_phone', $cus->customer_phone);
                Session::put('customer_address', $cus->customer_address);
                return redirect()->back();
            } else {
                Session::put('mess', 'Sai Mật Khẩu');
                return redirect()->back();
            }
        } catch (Exception $e) {
            Session::put('mess', 'Sai Mật Khẩu');
            return redirect()->back();
        }
    }

    public function save_check_out(Request $request)
    {
        $data = array();
        $currentTime = Carbon::now();
        $formattedDateTime = $currentTime->toDateTimeString();
        $data['shoppingcustomer_name'] = $request->input('shoppingcustomer_name');
        $data['shoppingcustomer_phone'] = $request->input('shoppingcustomer_phone');
        $data['shoppingcustomer_address'] = $request->input('shoppingcustomer_address');
        $data['shoppingcustomer_note'] = $request->input('shoppingcustomer_note');
        $data['created_at'] = $formattedDateTime;

        $shippingcustomer_id = DB::table('tbl_shoppingcustomer')->insertGetId($data);


        $dt = array();
        $dt['payment_method'] = $request->input('payment_method');
        $payment_id = DB::table('tbl_payment')->insertGetId($dt);


        $order = array();
        $order['customer_id'] = Session::get('customer_id');
        $order['shoppingcustomer_id'] = $shippingcustomer_id;
        $order['payment_id'] = $payment_id;
        $order['order_total'] = Cart::subtotal(0, ',', '');
        $order['order_status'] = "Chờ Xác Nhận Đơn Hàng";
        $order_id = DB::table('tbl_order')->insertGetId($order);

        $product = Cart::content();
        foreach ($product as $key) {
            $orderdetail = array();
            $orderdetail['order_id'] = $order_id;
            $orderdetail['product_id'] = $key->id;
            $orderdetail['product_name'] = $key->name;
            $orderdetail['product_price'] = $key->price;
            $orderdetail['product_quantity'] = $key->qty;
            $orderdetail_id = DB::table('tbl_order_detail')->insertGetId($orderdetail);
        }
        Cart::destroy();
        session()->flash('success', 'Cảm Ơn Bạn Đã Đặt Hàng');

        return Redirect('welcome');
    }

    public function allorder()
    {
        $all_order = DB::table('tbl_order')
            ->join('tbl_shoppingcustomer', 'tbl_shoppingcustomer.shoppingcustomer_id', '=', 'tbl_order.shoppingcustomer_id')
            ->get();
        return view('admin/allorder', ["all_order" => $all_order]);
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
    public function update_status(Request $request, $order_id)
    {
        $status = $request->input('order_status');
        DB::update('update tbl_order set order_status=? where order_id = ?', [$status, $order_id]);
        return redirect()->back();
    }
    public function show_acc()
    {
        return view('client/acc');
    }

    public function show_list_order($id)
    {
        $arr = DB::table('tbl_shoppingcustomer')
            ->select('tbl_shoppingcustomer.*', 'tbl_order.order_total', 'tbl_order.order_status', 'tbl_order.order_id')
            ->join('tbl_order', 'tbl_shoppingcustomer.shoppingcustomer_id', '=', 'tbl_order.shoppingcustomer_id')
            ->where('tbl_order.customer_id', '=', $id)
            ->get();
        return view('client/listorder', ["arr" => $arr]);
    }

    public function list_order_detail($orderID)
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
        return view('client/detailorder', ["arr" => $arr], ["data" => $data]);
    }
}
