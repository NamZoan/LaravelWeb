<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Shop Bán Đồ Điện Tử</title>
	<link href="{{asset('fontend/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('fontend/css/font-awesome.min.css')}}" rel="stylesheet">
	<link href="{{asset('fontend/css/prettyPhoto.css')}}" rel="stylesheet">
	<link href="{{asset('fontend/css/price-range.css')}}" rel="stylesheet">
	<link href="{{asset('fontend/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('fontend/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('fontend/css/responsive.css')}}" rel="stylesheet">
	<link href="{{asset('fontend/css/sweetalert.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!--[if lt IE 9]>

    <![endif]-->
	<link rel="shortcut icon" href="images/ico/favicon.ico">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head>
<!--/head-->

<body>

	<?php

	use Illuminate\Support\Facades\Session;
	?>
	@if(session('success'))
	<script>
		alert("{{ session('success') }}");
	</script>
	@endif

	<header id="header">
		<!--header-->
		<div class="header_top">
			<!--header_top-->
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
		<div class="header-middle">
			<!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="shop-menu pull-left">
							<ul class="nav navbar-nav">
								<li><a href="{{URL::TO('welcome')}}"><i class="fa fa-home" aria-hidden="true"></i></i>Home</a></li>
								<li><a href="{{URL::to('gio-hang')}}"><i class="fa fa-shopping-cart"></i> Giỏ Hàng</a>
								</li>
								<?php
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
		</div>
		<!--/header-middle-->
	</header>
	<!--/header-->
	@yield('content')
	<section id="slider">
		<!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>

						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>WEB</span>-SHOPPER</h1>
									<h2>Newest product of the shop</h2>
									@foreach($product_new as $key)
									<h4>{{$key->product_name}}</h4>
								</div>
								<div class="col-sm-6">
									<img style="height:300px;margin-left:-40px" src="/img-product/{{$key->product_imge}}">
									@endforeach
									<img src="images/home/girl1.jpg" class="girl img-responsive" alt="" />
								</div>
							</div>
							@foreach($pro as $key)
							<div class="item">
								<div class="col-sm-6">
									<h1><span>WEB</span>-SHOPPER</h1>
									<h2>Newest product of the shop</h2>
									<h4>{{$key->product_name}}</h4>
								</div>
								<div class="col-sm-6">
									<img style="height:300px;margin-left:-40px" src="/img-product/{{$key->product_imge}}" class="girl img-responsive" alt="" />
								</div>
							</div>
							@endforeach
						</div>
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--/slider-->

	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Danh Mục Sản Phẩm</h2>
						<div class="panel-group category-products" id="accordian">
							<!--category-productsr-->
							@foreach($category as $key)
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<form action="{{'/welcome/'.$key->category_id}}" method="post">
											<a href="{{URL::to('/danh-muc-san-pham/'.$key->category_id)}}">
												{{$key->category_name}}
											</a>
										</form>
									</h4>
								</div>
								<div id="{{$key->category_id}}" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li>1</li>
											<li>1</li>
										</ul>
									</div>
								</div>
							</div>
							@endforeach
						</div>
						<!--/category-products-->

						<div class="brands_products">
							<!--brands_products-->
							<h2>Thương Hiệu Sản Phẩm</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									@foreach($brand as $key)
									<li><a href="{{URL::to('/thuong-hieu-san-pham/'.$key->brand_id)}}">
											{{$key->brand_name}}</a></li>
									@endforeach
								</ul>
							</div>
						</div>
						<!--/brands_products-->



						<div class="shipping text-center">
							<!--shipping-->
							<img src="images/home/shipping.jpg" alt="" />
						</div>
						<!--/shipping-->

					</div>
				</div>

				<div class="col-sm-9 padding-right">
					<div class="features_items">
						<!--features_items-->
						<h2 class="title text-center">Sản Phẩm Mới Nhất</h2>
						<div class="feature-items-list">
							@foreach($product as $key)
							<div class="">
								<div class="product-image-wrapper ">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="/img-product/{{$key->product_imge}}">
											<h2>{{number_format(($key->product_price),0,',','.')}} VNĐ</h2>
											<p>{{$key->product_name}}</p>
											<a href="{{URL::to('/chi-tiet-san-pham/'.$key->product_id)}}" class="btn btn-default add-to-cart"> Chi Tiết Sản Phẩm</a>
										</div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{asset('fontend/js/sweetalert.min.js')}}"></script>
	<script src="{{asset('fontend/js/jquery.js')}}"></script>
	<script src="{{asset('fontend/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('fontend/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('fontend/js/price-range.js')}}"></script>
	<script src="{{asset('fontend/js/jquery.prettyPhoto.js')}}"></script>
	<script src="{{asset('fontend/js/main.js')}}"></script>
	<script src="{{asset('fontend/js/html5shiv.js')}}"></script>
	<script src="{{asset('fontend/js/respond.min.js')}}"></script>

	<script type='text/javascript'>
		$(document).ready(function() {
			$('.add').click(function() {
				var id = $(this).data('id_product');
				var cart_product_id = $('.product_id_' + id).val();
				var cart_product_name = $('.product_name_' + id).val();
				var cart_product_imge = $('.product_imge_' + id).val();
				var cart_product_price = $('.product_price_' + id).val();
				var cart_product_quantity = $('.product_quantity_' + id).val();
				var _token = $('input[name="_token"]').val();
				$.ajax({
					url: '{{url("/add-cart-ajax")}}',
					method: 'post',
					data: {
						cart_product_id: cart_product_id,
						cart_product_name: cart_product_name,
						cart_product_imge: cart_product_imge,
						cart_product_price: cart_product_price,
						cart_product_quantity: cart_product_quantity,
						_token: _token
					},
					success: function(data) {
						swal({
								title: "Đã Thêm Vào Giỏ Hàng",
								text: "Bạn Có Thể Mua Hàng Tiếp Hoặc Vào Giỏ Hàng",
								showCancelButton: true,
								cancelButtonText: "Xem Tiếp",
								confirmButtonClass: "btn-sucess",
								confirmButtonText: "Đi Đến Giỏ Hàng",
								closeOnConfirm: false
							},
							function() {
								window.location.href = ("{{url::to('/gio-hang-ajax')}}");
							});
					}
				});
			});
		});
	</script>

</body>

</html>