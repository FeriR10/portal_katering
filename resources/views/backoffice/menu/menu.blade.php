@extends('backoffice/layout/master')


@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Menu<strong></strong></h3>
                <div class="card-tools">
                    <a href="/backoffice/tambahmenu" class="btn btn-outline-secondary btn-sm">
                        Tambah
                    </a>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                @if (Session::has('status'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="btn btn-success close" data-dismiss="alert" sty>&times;</button>
                    {{Session::get('message')}}
                </div>
                @endif
                <style>
                    .table td,
                    .table th {
                        vertical-align: middle !important;
                    }

                </style>
                <table id="example1" class="table table-bordered table-striped text-center">
                    <thead>
                        <tr class="highlight">
                            <th>Nama Menu</th>
                            <th>deskripsi</th>
                            <th>Harga</th>
                            <th>Gambaar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        @foreach ($menus as $menu)
                        <tr>
                            <td>{{ $menu->nama_menu }}</td>
                            <td>{{ $menu->deskripsi }}</td>
                            <td>{{ $menu->harga }}</td>
                            <td><img src="{{asset('storage/'.$menu->thumbnail)}}" width="100px" height="100px"></td>
                            <td>
                                <a href="/backoffice/updatemenu/{{ $menu->id }}" class="btn btn-primary btn-sm">Edit</a>
                                <a href="/backoffice/deletemenu/{{ $menu->id }}" class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->

            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>

@endsection
