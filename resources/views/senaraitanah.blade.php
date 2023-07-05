@extends('navigation')

@section('navigation')
<div class="content-wrapper container">
    <section class="content-header">
        <h1>Senarai Tanah</h1>
    </section>

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
                                <!-- Table header content -->
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
                            <!-- Table body content -->
                        </tbody>
                        <tfoot>
                            <tr>
                                <!-- Table footer content -->
                                <th>-</th>
                                <th><input type="text" class="form-control"
                                        placeholder="Nama Pemilik" name="pemilik"></th>
                                <th><input type="text" class="form-control"
                                        placeholder="No.Geran" name="nogeran"></th>
                                <th><select class="form-control" name="daerah_id">
                                        <option value="">Sila pilih...</option>
                                        @foreach (DB::table('lokasitanah')->get() as $lokasi)
                                            <option value="{{ $lokasi->kodlokasi }}">
                                                {{ $lokasi->namalokasi }}</option>
                                        @endforeach
                                    </select>
                                </th>
                                <th><input type="text" class="form-control"
                                        placeholder="Luas Geran" name="luasgeran"></th>
                                <th><input type="text" class="form-control"
                                        placeholder="Luas Dipohon" name="luaspohon"></th>
                                <th><select class="form-select" name="pemilikan">
                                        <option value="0">Sila Pilih...</option>
                                        <option value="1">
                                            Sendiri </option>
                                        <option value="2">
                                            Sewa </option>
                                        <option value="3">
                                            Tuntut Waris </option>
                                    </select></th>
                                <th>



                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card card-default">
                                                <div class="card-body">
                                                    <form action="/target" method="POST" enctype="multipart/form-data">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="formFile" class="form-label">Select a file</label>
                                                                    <input class="form-control" type="file" id="formFile" name="file">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Upload</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
        <button type="submit" class="btn btn-primary" name="submit1" id="submit1" value="SimpanJumlah">Simpan</button>
        <button onclick="window.open('{{ route('pet_cetak') }}')" type="button" class="btn btn-primary" name="cetakp" value="Cetakp">Cetak PP13.1</button>

    </div>

</div>
<footer class="main-footer"><b>Dibangunkan & Hakcipta Terpelihara</b><strong> &copy; 2020 <a href="http://www.jpkn.sabah.gov.my">JPKN</a>.</strong>
</footer>

<!-- JavaScript Libraries -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/chart.js/Chart.min.js"></script>
<script src="plugins/sparklines/sparkline.js"></script>
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<!-- Your custom JavaScript code -->
<script src="dist/js/pages/dashboard.js"></script>
@endsection
