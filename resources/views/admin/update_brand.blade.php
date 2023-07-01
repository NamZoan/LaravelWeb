
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin AddBrand</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('fontend/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('fontend/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


</head>

<body class="container">


    <!-- Page Wrapper -->
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
                <h1 class="h3 mb-2 text-gray-800">Cập Nhật Thương Hiệu Sản Phẩm</h1>


                    <form method="post" action="{{'/updatebrand/'.$edit_brand->brand_id}}">
                        @method('PATCH')
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Mã Thương Hiệu</label>
                            <input type="int" class="form-control" name="brand_id" value={{$edit_brand->brand_id}} readonly>
                        </div>
                        <div class="form-group">
                            <label>Tên Thương Hiệu</label>
                            <input type="text" class="form-control" name="brand_name" value={{$edit_brand->brand_name}} required>
                        </div>
                        <div class="form-group">
                            <label>Mô Tả Thương Hiệu</label>
                            <input type="text" class="form-control" name="brand_desc" value={{$edit_brand->brand_desc}} required>
                        </div>
                        
                        
                        <button type="submit" class="btn btn-primary">Chỉnh Sửa</button>
                        <a class="btn btn-primary" href="{{URL::to('allbrand')}}">Thoát</a>
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
    <!-- End of Page Wrapper -->
    <!-- Scroll to Top Button-->
    

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('fontend/js/jquery.min.js')}}"></script>
    <script src="{{ asset('fontend/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('fontend/js/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('fontend/js/sb-admin-2.min.js')}}"></script>

</body>

</html>