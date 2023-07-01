<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin AddProduct</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('fontend/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('fontend/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body class="container">


    <div id="wrapper">

        <!-- Sidebar -->

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">Thêm Sản Phẩm</h1>


                    <form action="{{URL::to('/addproduct')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">

                            <div class="form-group">
                                <label>Tên Sản Phẩm</label>
                                <input class="form-control" type="text" name="product_name" required>
                            </div>

                            <div class="form-group">
                                <label>Mô Tả Sản Phẩm</label>
                                <input class="form-control" type="text" name="product_desc" required>
                            </div>

                            <div class="form-group">
                                <label>Giá Sản Phẩm</label>
                                <input class="form-control" type="number" name="product_price" required>
                            </div>

                            <div class="form-group">
                                <label>Ảnh Sảm Phẩm</label>
                                <input class="form-control" type="file" accept="image/png, image/gif, image/jpeg" name="product_imge" required>
                            </div>

                            <div class="form-group">
                                <label>Thương Hiệu Sản Phẩm</label>
                                <select class="form-control" name="brand_id" id="">
                                    @foreach($brand as $key)
                                    <option value="{{$key->brand_id}}" require>{{$key->brand_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Danh Mục Sản Phẩm</label>
                                <select class="form-control" name="category_id" id="">
                                @foreach($category as $key)
                                    <option value="{{$key->category_id}}" required>{{$key->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button class="btn btn-primary" name="add_product">Thêm</button>
                            <a class="btn btn-primary" href="{{URL::to('allproduct')}}">Thoát</a>

                        </div>
                    </form>

                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('fontend/js/jquery.min.js')}}"></script>
    <script src="{{ asset('fontend/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('fontend/js/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('fontend/js/sb-admin-2.min.js')}}"></script>

</body>

</html>