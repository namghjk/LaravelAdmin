<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.head')
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Admin</b>LTE</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Register</p>
                @include('admin.alert')
                <form action="{{ route('regist') }}" method="POST">
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="name@example.com" value="{{old('email')}}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="name" name="name" class="form-control" placeholder="Name" value="{{old('name')}}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fas fa-user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password" value="{{old('password')}}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="confirmPassword" class="form-control"
                            placeholder="Confirm password" value="{{old('confirmPassword')}}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <!-- /.col -->
                        <div class="col-12">
                            <div class="w-100 mt-3">
                                <label for="Register">
                                    <a href="{{ route('login') }}" class="text-primary "> Đã có tài khoản! Quay về
                                        trang Đăng nhập </a>
                                </label>
                            </div>
                        </div>
                    </div>
                    @csrf
                </form>

            </div>
        </div>
    </div>
    <!-- /.login-box -->

    @include('admin.footer')

</body>

</html>
