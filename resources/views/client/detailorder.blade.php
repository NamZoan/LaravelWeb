<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Contact | E-Shopper</title>
	<link href="{{asset('fontend/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('fontend/css/font-awesome.min.css')}}" rel="stylesheet">
	<link href="{{asset('fontend/css/prettyPhoto.css')}}" rel="stylesheet">
	<link href="{{asset('fontend/css/price-range.css')}}" rel="stylesheet">
	<link href="{{asset('fontend/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('fontend/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('fontend/css/responsive.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
	<link rel="shortcut icon" href="images/ico/favicon.ico">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i>+84 326 684 220</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> nam138665@huce.edu.vn</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="shop-menu pull-left">
							<ul class="nav navbar-nav">
								<li><a href="{{URL::TO('welcome')}}"><i class="fa fa-home" aria-hidden="true"></i></i>Home</a></li>
								<li><a href="{{URL::to('gio-hang')}}"><i class="fa fa-shopping-cart"></i> Giỏ Hàng</a></li>
								<?php

								use Illuminate\Support\Facades\Session;

								$id = Session::get('customer_id');
								$name = Session::get('customer_name');
								$email = Session::get('customer_email');
								$phone = Session::get('customer_phone');
								$address = Session::get('customer_address');
								$shoppong_id = Session::get('shoppingcustomer_id');

								if ($id == NULL) {
								?>
									<li><a href="{{URL::to('dang-nhap')}}"><i class="fa fa-lock"></i>Đăng Nhập</a></li>
								<?php
								} else {
								?>
									<li><a href="{{URL::to('tai-khoan')}}"><i class="fa fa-user"></i>{{$name}}</a></li>
									<li><a href="{{URL::to('dang-xuat')}}"><i class="fa fa-lock"></i>Đăng Xuất</a></li>
								<?php
								}
								?>
							</ul>
						</div class="shop-menu pull-left">

						<div class="search_box pull-right">
							<div>
								<form action="{{URL::to('tim-kiem-san-pham')}}" method="post">
									{{csrf_field()}}
									<input type="text" placeholder="Tìm Kiếm" name="search">
									<button type="submit"><i class="fa fa-search-minus" aria-hidden="true"></i></button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	</header>

	<div id="contact-page" class="container">
		<div class="bg">

			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->

						</div><!--/category-products-->

						<div class="brands_products"><!--brands_products-->
							<a href="{{URL::to('tai-khoan')}}">
								<h2>Thông Tin Tài Khoản</h2>
							</a>
							<a href="{{URL::to('gio-hang')}}">
								<h2>Giỏ Hàng</h2>
							</a>
							<form action="">
								<a href="{{URL::to('/lich-su-don-hang/'.$id)}}">
									<h2>Lịch Sử Đơn Hàng</h2>
								</a>
							</form>

							<div class="brands-name">
							</div>
						</div><!--/brands_products-->



						<div class="shipping text-center"><!--shipping-->
							<img src="images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->

					</div>
				</div>
				<div class="col-sm-8">
					<div class="contact-form">
						<h2 class="title text-center">Thông Tin Đơn Hàng Chi Tiết Đã Đặt</h2>
						<div class="table-responsive cart_info">
							<div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Tên Người Đặt</th>
                                            <th>Số Điện Thoại</th>
                                            <th>Địa Chỉ</th>
                                            <th>Note</th>
                                            <th>Trạng Thái</th>
                                            <th>Phương Thức Thanh Toán</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <td>{{$data->shoppingcustomer_name}}</td>
                                        <td>{{$data->shoppingcustomer_phone}}</td>
                                        <td>{{$data->shoppingcustomer_address}}</td>
                                        <td>{{$data->shoppingcustomer_note}}</td>
                                        <td>{{$data->order_status}}</td>
                                        <td>{{$data->payment_method}}</td>
                                    </tbody>
                                </table>
							</div>
						</div>
                        <h2 class="title text-center">Thông Tin Sản Phẩm Chi Tiết Đã Đặt</h2>
						<div class="table-responsive cart_info">
							<div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Tên Sản Phẩm</th>
                                            <th>Đơn Giá</th>
                                            <th>Số Lượng</th>
                                            <th>Tổng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($arr as $all_order)
                                        <tr>
                                            <td>{{$all_order->product_name}}</td>
                                            <td>{{$all_order->product_price}}</td>
                                            <td>{{$all_order->product_quantity}}</td>
                                            <td>{{$all_order->product_quantity * $all_order->product_price}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th>Tổng Đơn Hàng</th>
                                            <th>{{$data->order_total}}</th>
                                        </tr>
                                    </tfoot>
                                </table>
							</div>
						</div>
					</div>
				</div>
                

			</div>
		</div>
	</div><!--/#contact-page-->





	<script src="{{('fontend/js/jquery.js')}}"></script>
	<script src="{{('fontend/js/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
	<script type="text/javascript" src="{{('fontend/js/gmaps.js')}}"></script>
	<script src="{{('fontend/js/contact.js')}}"></script>
	<script src="{{('fontend/js/price-range.js')}}"></script>
	<script src="{{('fontend/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{('fontend/js/jquery.prettyPhoto.js')}}"></script>
	<script src="{{('fontend/js/main.js')}}"></script>


</body>

</html>