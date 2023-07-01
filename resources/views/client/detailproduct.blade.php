<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Chi Tiết Sản Phảm</title>
    <link href="{{asset('/fontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/fontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('/fontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('/fontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('/fontend/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('/fontend/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('/fontend/css/responsive.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
	</header><!--/header-->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						
					<h2>Danh Mục Sản Phẩm</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
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
						</div><!--/category-products-->

						<div class="brands_products"><!--brands_products-->
							<h2>Thương Hiệu Sản Phẩm</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									@foreach($brand as $key)
									<li><a href="{{URL::to('/thuong-hieu-san-pham/'.$key->brand_id)}}">
											{{$key->brand_name}}</a></li>
									@endforeach
								</ul>
							</div>
						</div><!--/brands_products-->



						<div class="shipping text-center"><!--shipping-->
							<img src="images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->

						
						
						
						
						<div class="shipping text-center"><!--shipping-->
							<img src="images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->
						
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="/img-product/{{$detail_product->product_imge}}" style="height: 200px;margin-top: 75px;" alt="" />
							</div>
						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2>Tên Sản Phẩm: {{$detail_product->product_name}}</h2>
								
								<form action="{{URL::to('gio-hang')}}" method="POST">
                                {{csrf_field()}}
                                <span>
									<span>{{number_format(($detail_product->product_price),0,',','.')}} VNĐ</span>
									<label>Số Lượng</label>
                                    <input type="hidden" name="product_id" value="{{$detail_product->product_id}}">
									<input name="quantity" type="number" value="1" min="1" max="100"/>
								</span>
								
								<p><b>Mô Tả Sản Phẩm:</b>
                                <br>
                                {{$detail_product->product_desc}}</p>
								<p><b>Thương Hiệu:</b>{{$brand_product->brand_name}}</p>
								<p><b>Danh Mục:</b>{{$category_product->category_name}}</p>
								<br>
								<button type="submit" class="btn btn-fefault cart" style="margin-left: 0px">
										Thêm Vào Giỏ Hàng
								</button>
								</form>

								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	

  
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>