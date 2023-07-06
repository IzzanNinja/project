

@extends('navigation')

@section('navigation')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

                            <section class="content-header">
                                <h1>Senarai Tanah </h1>
                            </section>
                                <!-- Main content -->
    {{-- <form method="post" action="{{ route('store') }}" id="pet" name="pet"> --}}
        <form action="{{ route('geran.store') }}" method="POST">
            @csrf

                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="box">
                                        <div class="box-header">
                                            <h3 class="box-title"></h3>
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <table id="example2" class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th width="6%">Bil</th>
                                                        <th width="25%">Nama Pemilik<BR>Dalam Geran</th>
                                                        <th width="11%">No.Geran</th>
                                                        <th width="15%">Lokasi Tanah</th>
                                                        <th width="15%">Luas Dalam Geran<BR>(Ekar)</th>
                                                        <th width="12%">Luas Dipohon/<BR>Musim (Ekar)</th>
                                                        <th width="11%">Pemilikan Tanah</th>
                                                        <th width="11%">Muatnaik Geran</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>-</th>

                                                        <th><input type="text" class="form-control"
                                                                placeholder="Nama Pemilik" id="pemilikgeran" name="pemilikgeran"></th>

                                                        <th><input type="text" class="form-control"
                                                                placeholder="No.Geran" id="nogeran" name="nogeran"></th>





                                                        <th><select class="form-control" name="lokasitanah">
                                                                <option value="">Sila pilih...</option>
                                                                @foreach (DB::table('lokasitanah')->get() as $lokasi)
                                                                    <option value="{{ $lokasi->kodlokasi }}">
                                                                        {{ $lokasi->namalokasi }}</option>
                                                                @endforeach
                                                            </select>
                                                        </th>

                                                        <th><input type="text" class="form-control"
                                                                placeholder="Luas Geran" id="luasgeran" name="luasekar"></th>

                                                        <th><input type="text" class="form-control"
                                                                placeholder="Luas Dipohon" id="luaspohon" name="luaspohon"></th>

                                                                <th><select class="form-control" name="pemilikan">
                                                                    <option value="">Sila pilih...</option>
                                                                    @foreach (DB::table('pemilikan')->get() as $pemilikan)
                                                                        <option value="{{ $pemilikan->kodmilik }}">
                                                                            {{ $pemilikan->deskripsi }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </th>



                                                            {{-- <form action="{{ route('file.upload') }}" method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                <input type="file" name="file">
                                                                <button type="submit">Upload</button>
                                                            </form> --}}

                                                        </th>






                                                    <tr>
                                                        <th width="6%"></th>
                                                        <th width="25%">JUMLAH</th>
                                                        <th width="11%"></th>
                                                        <th width="15%"></th>
                                                        <th width="15%"><input type="text" class="form-control"
                                                                placeholder="Luas Geran" name="jumlahluasgeran" value=0>
                                                        </th>
                                                        <th width="12%"><input type="text" class="form-control"
                                                                placeholder="Luas DiPohon" name="jumlahluaspohon" value=0>
                                                        </th>
                                                        <th width="11%"></th>
                                                        <th width="11%"></th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <!-- /.box-body -->
                                    </div>
                                    <!-- /.box -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                            <div class="box-footer" style="text-align:center;">
                                <button type="submit" style="margin-top:2rem" class="btn btn-primary">Simpan</button>

                                <button onclick="window.open('{{ route('pet_cetak') }}')" type="button" class="btn btn-primary" name="cetakp" value="Cetakp">Cetak PP13.1</button>


                            </div>

                        </section>
                        <!-- /.content -->
                        </form>



                    </div>
                    <footer class="main-footer"><b>Dibangunkan & Hakcipta Terpelihara</b><strong> &copy; 2020 <a
                                href="http://www.jpkn.sabah.gov.my">JPKN</a>.</strong>
                    </footer>
                </div><!-- /.content-wrapper -->

                <!-- Control Sidebar -->
                <aside class="control-sidebar control-sidebar-dark">
                    <!-- Control sidebar content goes here -->
                </aside>
                <!-- /.control-sidebar -->
            </div>
            <!-- ./wrapper -->

          <!-- jQuery -->
{{-- <script src="plugins/jquery/jquery.min.js"></script> , after commented this, logout dropout working herm--}}
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
