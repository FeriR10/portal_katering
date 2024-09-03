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
                <h3 class="card-title">History Transaksi Pelanggan<strong></strong></h3>
                <div class="card-tools">

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
                        font-size: 90%;
                        vertical-align: middle !important;
                    }

                </style>
                <table id="example1" class="table table-bordered table-striped" style="text-align: center">
                    <thead>
                        <tr class="highlight">
                            <th>Nama Pemesan</th>
                            <th>Nama Menu</th>
                            <th>Jumlah</th>
                            <th>Total Harga</th>
                            <th>Tanggal Pengantaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cekout as $item)
                        <tr>
                            <td>{{@$item->users->name}}</td>
                            <td>{{@$item->menu->nama_menu}}</td>
                            <td>{{@$item->qty}}</td>
                            <td>{{@$item->total_harga}}</td>
                            <td>{{@$item->date}}</td>
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
