<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('fontend/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('fontend/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <img src="" alt="">
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        
                                        <h1 class="h4 text-gray-900 mb-4">Vui Lòng Đăng Nhập!  </h1>
                                    </div>
                                    <form class="user"  method="post" action="{{URL::to('/dashboard')}}">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <input type="text" name="ad_email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Vui Lòng Nhập Tài Khoản" required="">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="ad_password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Vui Lòng Nhập Mật Khẩu" required="">
                                        </div>
                                        <div>
                                            <input type="submit" class="btn btn-primary btn-user btn-block" value="Đăng Nhập" name="login">
                                        </div>
                                        <hr>
                                    </form>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Quên Mật Khẩu?</a>

                                        
                                        <?php
                                        use Illuminate\Support\Facades\Session;
                                        $message=Session::get('message');
                                        if($message){
                                            echo "<p style='color:red;'>".$message."</p>";
                                            Session::put('message',null);}
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>