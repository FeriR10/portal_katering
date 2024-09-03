<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PORTAL KATERING</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/adminlte/dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="#">Merchant Form</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Please complete the form below</p>
                @if (Session::has('status'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{ Session::get('message') }}
                </div>
                @endif
                <form action="/merchant-form-process" method="POST">
                    @csrf
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

                    <hr>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </div>
                        <!-- /.col -->
                        <div class="col-12 text-center">
                            <a href="/" class="">Back to Home</a>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ asset('assets/adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/adminlte/dist/js/adminlte.js') }}"></script>
</body>

</html>
