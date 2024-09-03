@extends('backoffice.layout.master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Menu</h1>
                </div>
                <div class="col-sm-6">
                    <form action="/frontoffice" method="GET" class="form-inline float-sm-right">
                        <input type="text" name="search" class="form-control mr-2" placeholder="Cari Merchant"
                            value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary">Cari</button>
                        
                                    <a href="/frontoffice" class="btn btn-warning ml-2">
                                        <i class="fas fa-refresh"></i>
                                    </a>
                                   
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">MENU</h3>
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
                    <button type="button" class="btn btn-success close" data-dismiss="alert">&times;</button>
                    {{ Session::get('message') }}
                </div>
                @endif

                <form action="keranjang/store" method="POST" id="keranjangForm">
                    @csrf
                    <div class="row mt-3">
                        @foreach ($menus as $menu)
                        <div class="col-sm-4 mb-4">
                            <!-- Menyesuaikan lebar kolom untuk responsivitas -->
                            <div class="card h-100 shadow-sm">
                                <!-- Menambahkan shadow untuk tampilan yang lebih baik -->
                                <div class="card-header bg-primary text-white">
                                    <p class="card-text mb-0" style="font-size: 14px;"><strong>Merchant:</strong>
                                        {{ $menu->merchant->nama_merchant }}</p>
                                        <p class="card-text mb-0" style="font-size: 14px;"><strong>Alamat: </strong>{{ $menu->merchant->lokasi }}</p>
                                </div>
                                <div class="card-body text-center">
                                    <!-- Nama menu di atas gambar -->

                                    @if ($menu->thumbnail)
                                    <img src="{{ asset('storage/' . $menu->thumbnail) }}" class="img-fluid mb-3"
                                        alt="{{ $menu->nama_menu }}" style="max-height: 180px;">
                                    @else
                                    <div class="text-center py-5 mb-3">
                                        <i class="fas fa-image fa-4x text-muted"></i>
                                        <p class="mt-2" style="font-size: 14px;">Gambar tidak tersedia</p>
                                    </div>
                                    @endif

                                    <p class="card-text mb-2" style="font-size: 20px;">
                                        <strong>{{ $menu->nama_menu }}</strong></p>
                                    <p class="card-text mb-2" style="font-size: 14px;">{{ $menu->deskripsi }}</p>
                                    <p class="card-text mb-3" style="font-size: 16px; font-weight: bold;">
                                        @currency($menu->harga)</p>

                                    <div class="form-check">
                                        <input type="checkbox" name="keranjang[{{ $menu->id }}]"
                                            class="form-check-input">
                                        <label class="form-check-label" style="font-size: 14px;">Tambah ke
                                            Keranjang</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="text-center  fixed-btn">
                        <button type=" submit" class="btn btn-primary btn-lg ">Masukan Keranjang</button>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<style>
    .fixed-btn {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 1000;
    }

</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script>
    document.getElementById('keranjangForm').addEventListener('submit', function (event) {
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        var checked = Array.prototype.slice.call(checkboxes).some(x => x.checked);

        if (!checked) {
            event.preventDefault();
            alert('Tidak ada barang yang dipilih');
        }
    });

</script>
@endsection
