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
                    <h1 class="h3 mb-2 text-gray-800">Thông Tin Người Nhận <a style="float:right" class="btn btn-primary" href="{{URL::to('allorder')}}">Thoát</a>
                    </h1>
                    <div class="form-group">
                        <div class="card shadow mb-4">
                            <div class="card-body">
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
                        </div>
                    </div>
                    <div class="container-fluid">
                        <form method="post" action="{{'/update-status/'.$data->order_id}}">
                            @method('PATCH')
                            {{csrf_field()}}
                            <div class="form-group">
                                <select name="cars" id="mySelect" onchange="displaySelectedText()">
                                    <option>Vui Lòng Chọn</option>
                                    <option>Chờ Xác Nhận Đơn Hàng</option>
                                    <option>Đã Xác Nhận Đơn Hàng</option>
                                    <option>Đang Đóng Gói Đơn Hàng</option>
                                    <option>Đang Vận Chuyển</option>
                                    <option>Đơn Hàng Đã Được Giao</option>
                                    <option>Hủy Đơn Hàng</option>
                                </select>
                                <script>
                                    function displaySelectedText() {
                                        var selectElement = document.getElementById("mySelect");
                                        var selectedText = selectElement.options[selectElement.selectedIndex].text;
                                        var inputElement = document.getElementById("myInput");
                                        inputElement.value = selectedText;
                                    }
                                </script>
                                <input type="submit" class="btn btn-primary" value="Cập Nhật Trạng Thái Đơn Hàng"></input>
                                <div class="col-sm-3"> <input id="myInput" type="text" class="form-control" name="order_status" value="" required placeholder="Các trường hợp khác">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="container-fluid">
                        <h1 class="h3 mb-2 text-gray-800">Thông Tin Đơn Hàng #{{$data->order_id}}</h1>
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Tên Sản Phẩm</th>
                                                <th>Đơn Giá Sản Phẩm</th>
                                                <th>Số Lượng Sản Phẩm</th>
                                                <th>Thành Tiền</th>
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