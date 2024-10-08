<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PORTAL KATERING</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets/adminlte/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet"
        href="{{asset('assets/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets/adminlte/dist/css/adminlte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <style>
        .additional-fields {
            display: none;
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html">Register</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign up to start your session</p>
                @if (Session::has('status'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="btn btn-success close" data-dismiss="alert">&times;</button>
                    {{Session::get('message')}}
                </div>
                @endif
                <form action="/register-process" method="POST">
                    {{ csrf_field() }}
                    <div>
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}">
                        @if($errors->has('name'))
                            <span class="help-block" style="color: red">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    
                    <div>
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                        @if($errors->has('email'))
                            <span class="help-block" style="color: red">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div>
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        @if($errors->has('password'))
                            <span class="help-block" style="color: red">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <div>
                        <label>Role</label>
                        <select name="role_id" id="role_id" class="form-control">
                            <option value="2">Merchant</option>
                            <option value="3">Buyer</option>
                        </select>
                    </div>
                    
                    <div id="additional-fields" class="additional-fields">
                        <div class="form-group">
                            <label for="nama_merchant">Nama Merchant</label>
                            <input type="text" name="nama_merchant" id="nama_merchant" class="form-control" placeholder=" Nama Merchant" value="{{ old('nama_merchant') }}">
                            @if ($errors->has('nama_merchant'))
                                <span class="help-block" style="color: red">{{ $errors->first('nama_merchant') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="lokasi">Lokasi</label>
                            <input type="text" name="lokasi" id="lokasi" class="form-control" placeholder="Lokasi" value="{{ old('lokasi') }}">
                            @if ($errors->has('lokasi'))
                                <span class="help-block" style="color: red">{{ $errors->first('lokasi') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="jenis_makanan">Jenis Makanan</label>
                            <input type="text" name="jenis_makanan" id="jenis_makanan" class="form-control" placeholder="Jenis Makanan" value="{{ old('jenis_makanan') }}">
                            @if ($errors->has('jenis_makanan'))
                                <span class="help-block" style="color: red">{{ $errors->first('jenis_makanan') }}</span>
                            @endif
                        </div>
                    </div>
                    
                    <hr>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block" style="color: aliceblue">Sign
                                Up</button>
                        </div>
                        <!-- /.col -->
                        <div class="col-12 text-center">
                            Have account? <a href="/" class="">Login</a>
                        </div>
                    </div>
                </form>
                <!-- /.login-card-body -->
            </div>
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{asset('assets/adminlte/plugins/jquery/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('assets/adminlte/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);

        $(document).ready(function() {
            $('#role_id').change(function() {
                if ($(this).val() == '2') { // Merchant selected
                    $('#additional-fields').show();
                } else {
                    $('#additional-fields').hide();
                }
            });
        });
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('assets/adminlte/dist/js/adminlte.js')}}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{asset('assets/adminlte/dist/js/pages/dashboard.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('assets/adminlte/dist/js/demo.js')}}"></script>
    <!-- DataTables -->
    <script src="{{asset('assets/adminlte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

</body>

</html>
