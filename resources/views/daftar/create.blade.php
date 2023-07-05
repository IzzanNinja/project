@extends('navigation')
@section('navigation')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Sistem Pembayaran Subsidi Pembajakan Sawah Padi
                {{-- <small>Modul Pegawai Pertanian</small> --}}
            </h1>
            <ol class="breadcrumb">
                <li><a href="home"><i class="fa fa-dashboard"></i> Laman Utama</a></li>
            </ol>
        </section>
        <!-- Main content -->
        <form method="POST" action="{{ route('daftar.store') }}">
            @csrf

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

                            <div class="box-body">
                                <div class="form-group">
                                    <label for="pemohon">Nama Pemohon</label>
                                    <input type="text" class="form-control" id="pemohon" name="pemohon"
                                        placeholder="Nama Pemohon">

                                    <label for="pendaftaran">No.Kad Pengenalan</label>
                                    <input type="text" class="form-control" id="nokp" name="nokp"
                                        placeholder="No.Kad Pengenalan">

                                    <!-- textarea -->
                                    <label>Alamat</label>
                                    <textarea class="form-control" rows="3" placeholder="Alamat ..." name="alamat"></textarea>

                                    <label for="poskod">Poskod</label>
                                    <input type="text" class="form-control" id="poskod" name="poskod"
                                        placeholder="Poskod">

                                    <label for="daerah">Daerah</label>
                                    <select class="form-control" name="daerah_id">
                                        <option value=""></option>
                                        @foreach (DB::table('daerah')->get() as $daerah)
                                            <option value="{{ $daerah->koddaerah }}">{{ $daerah->namadaerah }}</option>
                                        @endforeach
                                    </select>




                                    <label for="notelrumah">No. Telefon</label>
                                    <input type="text" class="form-control" id="notel" name="notel"
                                        placeholder="No.Telefon">

                                    <label for="notel">Handphone</label>
                                    <input type="text" class="form-control" id="nohp" name="nohp"
                                        placeholder="Handphone">

                                </div> <!-- /.form-group -->
                            </div> <!-- /.box-body -->
                        </div> <!-- /.box -->
                    </div>
                    <!--/.col (left) -->

                    <!-- right column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">MAKLUMAT LAIN </h3>
                            </div>
                            <div class="form-group">
                                <!-- /.box-header -->

                                <div class="box-body">
                                    <label>No.Kad Petani</label>
                                    <div class="input-group date">
                                        <input name="nokad" type="text" class="form-control" id="nokad">
                                    </div>
                                    <label>Tahun Permohonan</label>
                                    <div class="input-group date">
                                        <input name="tahunpohon" type="text" class="form-control" id="tahunpohon"
                                            value=2023>
                                    </div>
                                    <BR>

                                    <!-- radio -->
                                    <div class="form-group">
                                        <label>Pendaftaran</label>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="rd_daftar" id="rd_daftar1" value=1 checked>
                                                Baru
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="rd_daftar" id="rd_daftar2" value=2>
                                                Lama
                                            </label>
                                        </div>
                                    </div>


                                    <p></p>
                                    <div class="form-group">
                                        <P><label for="Pemohon">Musim Penanaman</label></P>

                                        <!-- checkbox -->
                                        <div class="form-group">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="ch_musim" id="ch_musim" value=1>
                                                    Luar Musim (Bulan Mac - Julai)</input>
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="ch_musim2" id="ch_musim2" value=1>
                                                    Musim Utama (Bulan Ogos - Feb)</input>
                                                </label>
                                            </div>
                                        </div>
                                        <label for="tarikh" style="margin-top: 11px">Tarikh</label>
                                        <div class="input-group date">
                                            <input name="tarikh" type="date" class="form-control" id="tarikh" />
                                            <span class="input-group-addon">
                                            </span>
                                        </div>

                                        <div class="box-footer">
                                            <button type="submit" style="margin-top:2rem" class="btn btn-primary"
                                                name="submit1" value="seterusnya">Simpan & Seterusnya</button>
                                        </div>
                                    </div> <!-- /.form-group -->
                                </div> <!-- /.box-body -->
                            </div> <!-- /.box -->
                        </div>
                        <!--/.col (right) -->
                    </div> <!-- /.row -->
            </section>
            <script type="text/javascript">
                $('#reload').click(function () {
                    $.ajax({
                        type: 'GET',
                        url: 'reload-captcha',
                        success: function (data) {
                            $(".captcha span").html(data.captcha);
                        }
                    });
                });
            </script>
        </form>
    </div>
    </div>
    <!--content wrapper-->

    <!-- Control Sidebar -->
    {{-- <aside class="control-sidebar control-sidebar-dark"> --}}
    <!-- Control sidebar content goes here -->
    {{-- </aside> --}}
    <!-- /.control-sidebar -->
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
    <!-- JavaScript DatePicker & initilization -->
    {{-- <script>
    $(document).ready(function() {
    $('#tarikh').datepicker();
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script> --}}


    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->

    <script src="dist/js/pages/dashboard.js"></script>
@endsection
