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
                <h3 class="card-title">KERANJANG<strong></strong></h3>
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
                <table id="example1" class="table table-bordered table-striped" style="text-align: center">
                    <thead>
                        <tr class="highlight">
                            <th scope="col">Makanan</th>
                            <th>Harga Satuan</th>
                            <th>QTY</th>
                            <th>Total Harga</th>
                            <th>option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($keranjang as $keranjang)
                        <tr>
                            <td>{{ $keranjang->menu->nama_menu }}</td>
                            <td>@currency( $keranjang->menu->harga )</td>
                            <td> {{ $keranjang->qty }}</td>
                            <td>@currency( $keranjang->qty * $keranjang->menu->harga )</td>
                            <td>
                              
                              
                            </td>
                            @empty

                            <td colspan="5">Tidak ada barang untuk cekout.</td>

                        </tr>
                        @endforelse
                    </tbody>

                    <tfoot>
                        <tr>
                            
                        </tr>
                        <td colspan="5" class="text-right font-weight-bold">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cekoout">
                                Cekout
                            </button>
                        </td>
                        </tr>
                </table>
            </div>
            <!-- /.card-body -->
            <!-- Button trigger modal -->


            <!-- Modal -->
            <div class="modal fade" id="cekoout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Cekout Now</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="cekoutstore" method="POST">
                                @csrf
                                <table id="example1" class="table table-bordered table-striped"
                                    style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th scope="col">Barang</th>
                                            <th>QTY</th>
                                            <th>Harga</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                    </tbody>
                                    <table border="1">
                                        <thead>
                                            <tr>
                                                <div class="form-group mb-3">
                                                    <label>Vocher tersedia</label>
                                                   
                                                </div>
                                            </tr>
                                            <tr>
                                                <div class="form-group mb-3">
                                                    
                                                </div>
                                            </tr>
                                            <tr>
                                                <div class="form-group mb-3">
                                                    <label for="">Keterangan</label>
                                                    <textarea type="text" name="keterangan" class="form-control"
                                                        value=""></textarea>

                                                </div> 
                                            </tr>
                                            <tr>
                                                
                                            </tr>
                                        </thead>
                                    </table>
                                    <tfoot>
                                        <tr>

                                        </tr>
                                    </tfoot>
                                </table>


                                <div class="modal-footer">
                                  
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>

@endsection
