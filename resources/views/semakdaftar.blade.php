<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

// Retrieve all daftar records for the logged in user
$userId = Auth::id();
$daftars = DB::table('daftar')->where('id', $userId)->get();
?>

@extends('navigation')

@section('navigation')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Sistem Pembayaran Subsidi Pembajakan Sawah Padi

            </h1>
            <ol class="breadcrumb">
                <li><a href="home"><i class="fa fa-dashboard"></i> Laman Utama</a></li>
            </ol>
        </section>

        <!-- flash message of success -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Main content -->
        {{-- <form method="post" action="{{ route('store') }}" id="pet" name="pet"> --}}
        {{-- <form action="{{ route('store') }}" method="POST">
        @csrf --}}
        <section class="content">
            <div class="row ">

                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">BUTIR-BUTIR PEMOHON (INDIVIDU)</h3>
                        </div>
                        <!-- /.box-header -->

                        @foreach ($daftars as $daftar)
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="pemohon">Nama Pemohon</label>
                                    <input type="text" class="form-control" id="pemohon" name="pemohon"
                                        placeholder="Nama pemohon" value="{{ $daftar->pemohon }}">



                                    <label for="pendaftaran">No.Kad Pengenalan</label>
                                    <input type="text" class="form-control" id="nokp" name="nokp"
                                        placeholder="No.Kad Pengenalan" value="{{ $daftar->nokp }}">

                                    <!-- textarea -->
                                    <label>Alamat</label>
                                    <textarea class="form-control" rows="3" placeholder="Alamat ..." name="alamat" value="{{ $daftar->alamat }}"></textarea>

                                    <label for="poskod">Poskod</label>
                                    <input type="text" class="form-control" id="poskod" name="poskod"
                                        placeholder="Poskod" value="{{ $daftar->poskod }}">

                                    <!-- select daerah-->
                                    <label for="daerah">Daerah</label>
                                        <option value="{{ $daftar->daerah_id }}"></option>


                                    <label for="notelrumah">No. Telefon</label>
                                    <input type="text" class="form-control" id="notel" name="notel"
                                        placeholder="No.Telefon" value="{{ $daftar->notel }}">

                                    <label for="notel">Handphone</label>
                                    <input type="text" class="form-control" id="nohp" name="nohp"
                                        placeholder="Handphone" value="{{ $daftar->nohp }}">
                                </div>
                            </div>
                    </div>
                </div>


<!-- right column -->
<div class="col-md-6">
    <!-- general form elements -->
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">MAKLUMAT LAIN</h3>
        </div>
        <div class="form-group">
            <!-- /.box-header -->

            <div class="box-body">
                <label>No.Kad Petani</label>
                <div class="input-group date">
                    <input type="text" class="form-control" placeholder="No. Kad Petani JIKA ADA" name="nokad" id="nokad" value="{{ $daftar->nokad }}">
                </div>
                <label>Tahun Permohonan</label>
                <div class="input-group date">
                    <input name="tahunpohon" type="text" class="form-control" id="tahunpohon" value="2023" disabled>
                </div>
                <br>

                <div class="form-group">
                    <label>Pendaftaran</label>
                    <div class="radio">
                        <label>
                            <input type="radio" name="rd_daftar" id="rd_daftar1" value="1" {{ $daftar->rd_daftar == 1 ? 'checked' : '' }}>
                            Baru
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="rd_daftar" id="rd_daftar2" value="2" {{ $daftar->rd_daftar == 2 ? 'checked' : '' }}>
                            Lama
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <p><label for="Pemohon">Musim Penanaman</label></p>

                    <!-- checkbox -->
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="ch_musim" id="ch_musim" value="1" {{ $daftar->ch_musim ? 'checked' : '' }}>
                                Luar Musim (Bulan Mac - Julai)
                            </label>
                        </div>

                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="ch_musim2" id="ch_musim2" value="1" {{ $daftar->ch_musim2 ? 'checked' : '' }}>
                                Musim Utama (Bulan Ogos - Feb)
                            </label>
                        </div>
                    </div>
                </div>

                    <label for="tarikh" style="margin-bottom: 6px">Tarikh</label>
                    <div class="input-group date">
                        <input name="tarikh" type="date" class="form-control" id="tarikh" value="{{ $daftar->tarikh }}">
                        <span class="input-group-addon">
                        </span>
                    </div>
                </div>
            </div> <!-- /.box-body -->
        </div> <!-- /.form-group -->
    </div> <!-- /.box -->
</div> <!--/.col (right) -->



                                    <div class="box-footer">
                                        {{-- <button type="submit" style="margin-top:1rem" class="btn btn-primary" name="submit1" value="seterusnya">Simpan & Seterusnya</button> --}}
                                        <button type="submit" style="margin-top:2rem"
                                            class="btn btn-primary">Kemaskini</button>
                                    </div>
                                </div> <!-- /.form-group -->
                            </div> <!-- /.box-body -->
                    </div> <!-- /.box -->
                </div>
                <!--/.col (right) -->
            </div> <!-- /.row -->
        </section>
        </form>
        @endforeach
    </div>
    </div>
    <!--content wrapper-->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    {{-- <script src="plugins/jquery/jquery.min.js"></script> , after commented this, logout dropout working herm --}}
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->

    <script src="dist/js/pages/dashboard.js"></script>
@endsection
