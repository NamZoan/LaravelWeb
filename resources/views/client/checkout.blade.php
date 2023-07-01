<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Checkout | E-Shopper</title>
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

	
	<section id="cart_items">
		<div class="container">
			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-10 clearfix container-fluid">
						<div class="bill-to">
							<p>Thông Tin Người Nhận Hàng</p>
							<div class="form-one">
								<form action="{{URL::to('thanh-toan')}}" method="post">
									{{csrf_field()}}
									<input name="shoppingcustomer_name" type="text" placeholder="Tên Của Bạn" required>
									<input name="shoppingcustomer_phone" type="text" placeholder="Số Điện Thoại" required>
									<input name="shoppingcustomer_address" type="text" placeholder="Địa Chỉ" required>
									<input name="shoppingcustomer_note" type="text" placeholder="Note">
									<div class="form-check">
                                        <input class="form-check-input" type="radio" name="payment_method" value="Thanh Toán Trực Tuyến">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Thanh Toán Trực Tuyến
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="payment_method" value="Thanh Toán Khi Nhận Hàng" checked>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Thanh Toán Khi Nhận Hàng
                                        </label>
                                    </div>
									<input type="submit" value="Thanh Toán"  style="background-color: #FF9933;">
									
								</form>
							</div>
						</div>
					</div>
					<div class="col-sm-10 clearfix">

					</div>
				</div>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<script src="{{asset('fontend/js/jquery.js')}}"></script>
	<script src="{{asset('fontend/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('fontend/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('fontend/js/jquery.prettyPhoto.js')}}"></script>
	<script src="{{asset('fontend/js/main.js')}}"></script>
</body>

</html>