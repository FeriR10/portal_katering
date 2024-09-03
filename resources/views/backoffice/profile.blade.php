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

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                    data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <form role="form" action="/updateprofile/{{ $profile->id }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="">Nama Prusahaan</label>
                                    <textarea name="nama_prusahaan" class="form-control">{{$profile->nama_prusahaan ?? ''}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <textarea name="alamat"
                                        class="form-control">{{$profile->alamat ?? ''}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Kontak</label>
                                    <textarea name="kontak"
                                        class="form-control">{{$profile->kontak ?? ''}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Deskripsi</label>
                                    <textarea name="deskripsi"
                                        class="form-control">{{$profile->deskripsi ?? ''}}</textarea>
                                </div>


                                <button type="submit" class="btn btn-success">Simpan</button>
                            </form>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            Footer
                        </div>
                        <!-- /.card-footer-->
                    </div>
                    <!-- /.card -->

                </section>
            
    <!-- /.content -->
</div>

@endSection
