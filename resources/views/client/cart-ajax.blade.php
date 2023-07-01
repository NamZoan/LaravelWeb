<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Giỏ Hàng</title>
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
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="{{URL::TO('welcome')}}"><img src="{{asset('fontend/img/logo.png')}}" alt="" style="height: 100px;width: 200px;"></a>
						</div>

					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-star"></i>Yêu Thích</a></li>
								<li><a href="{{URL::to('gio-hang')}}"><i class="fa fa-shopping-cart"></i> Giỏ Hàng</a></li>
								<?php

								use Illuminate\Support\Facades\Session;

								$id = Session::get('customer_id');

								if ($id == NULL) {
								?>
									<li><a href="{{URL::to('dang-nhap')}}"><i class="fa fa-lock"></i>Đăng Nhập</a></li>
								<?php
								} else {
								?>
									<li><a href="{{URL::to('dang-xuat')}}"><i class="fa fa-lock"></i>Đăng Xuất</a></li>
								<?php
								}
								?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->


	</header><!--/header-->

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
					<li><a>Giỏ Hàng Của Bạn</a></li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<form action="{{url::to('/update-cart-ajax')}}" method="post">
					@csrf
					<table class="table table-condensed">
						<thead>
							<tr class="cart_menu">
								<td class="image">Sản Phẩm</td>
								<td class="description">Tên</td>
								<td class="price">Giá</td>
								<td class="quantity">Số Lượng</td>
								<td class="total">Thành Tiền</td>
								<td></td>
							</tr>
						</thead>
						
						<tbody>
							@php
							$total=0;
							@endphp
							@foreach(Session::get('cart') as $key=>$cart)
							@php
							$sum=$cart['product_quantity']*$cart['product_price'];
							$total+=$sum;
							@endphp
							<tr>
								<td class="cart_product">
									<img src="{{asset('img-product/'.$cart['product_imge'])}}">
								</td>
								<td class="cart_description">
									<h4>{{$cart['product_name']}}</h4>
								</td>
								<td class="cart_price">
									<p>{{number_format($cart['product_price'],0,',','.')}} VNĐ</p>
								</td>

								<td class="cart_quantity">
									<div class="cart_quantity_button">
										<h4><input type="number" name="cart_quantity[{{$cart['session_id']}}]" value="{{$cart['product_quantity']}}" max='100' min='1'></h4>
									</div>
								</td>
								<td class="cart_total">
									<p class="cart_total_price">{{number_format(($cart['product_quantity']*$cart['product_price']),0,',','.')}} VNĐ</p>
								</td>
								<td class="cart_delete">
									<a class="cart_quantity_delete" href="{{url::to('/delete-cart-ajax/'.$cart['session_id'])}}">Xóa</a>
								</td>
							</tr>
							@endforeach
							<tfoot>
                                        <tr>
                                            <th><input type="submit" value="Cập Nhật Giỏ Hàng"></th>
                                            <th><?php
                                        $message=Session::get('message');
                                        if($message){
                                            echo "<p style='color:red;'>".$message."</p>";
                                            Session::put('message',null);}
                                        ?></th>
                                            <th></th>
                                            <th>Tổng Đơn Hàng</th>
                                            <th>{{number_format(($total),0,',','.')}} VNĐ</th>
                                        </tr>
                                    </tfoot>
						</tbody>
						
					</table>
				</form>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="row">
				<div class="col-sm-8">
				</div>
				<div class="col-sm-4">
						<?php
						$id = Session::get('customer_id');
						if ($id) {
						?>
							<a class="btn btn-default check_out" href="{{URL::to('thanh-toan')}}">Thanh Toán</a>
						<?php
						} else {
						?>
							<a class="btn btn-default check_out" href="{{URL::to('dang-nhap')}}">Đăng Nhập</a>
						<?php
						}
						?>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->


	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


	<script src="{{asset('fontend/js/jquery.js')}}"></script>
	<script src="{{asset('fontend/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('fontend/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('fontend/js/jquery.prettyPhoto.js')}}"></script>
	<script src="{{asset('fontend/js/main.js')}}"></script>
</body>

</html>