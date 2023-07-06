<?php
// Retrieve all daftar records for the logged in user
$daftars = DB::select('SELECT * FROM daftar WHERE id = ?', [Auth::id()]);
?>
@extends('navigation')
@section('navigation')
    <html>

    <head>
    </head>

    <!-- Left side column. contains the logo and sidebar -->

    <!-- /.sidebar -->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Sistem Pembayaran Subsidi Pembajakan Sawah Padi
                <small>Modul Petani</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="index.php"><i class="fa fa-dashboard"></i> Laman Utama</a></li>
            </ol>
        </section>
        <!-- Main content -->
        <form method="post" id="pet_lsdetail" name="pet_lsdetail">
            <section class="content">
                {{-- <h3 style="color:red;text-align:center;background-color: powderblue;">
Keputusan Carian Petani Untuk Disemak Bagi Tahun: 2022    </H3> --}}
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">

                            <div class="box-body">
                                <table id="lsdetail" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th width="5%">Bil</th>
                                            <th width="15%">Nama Pemohon</th>
                                            <th width="15%">No.Kad Pengenalan</th>
                                            <th width="12%">Jumlah Luas Dipohon</th>
                                            <th width="12%">Semak</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @foreach ($daftars as $daftar)
                                                <td scope="row">{{ $loop->iteration }}</td>
                                                <td>{{ $daftar->pemohon }}</td>
                                                <td>{{ $daftar->nokp }}</td>
                                            @endforeach
                                            <td>
                                            </td>
                                            <td style="text-align:center;"><a href="{{ url('/daftar/' . $daftar->id) }}"
                                                    class="btn btn-sm btn-info">Lihat</a></a></td>
                                        </tr>

                                        <tr>
                                            <td colspan=2 style="text-align:right;"><b>Jumlah Pemohon (ms 1): </b>
                                            <td>1
                                            <td style="text-align:right;"><b>Jumlah Dipohon (Ekar)</b>
                                            <td>0
                                        </tr>
                                        <tr>
                                            <td colspan=2 style="text-align:right;"><b>Jumlah Keseluruhan Pemohon: </b>
                                            <td>1
                                            <td style="text-align:right;"><b>Jumlah Keseluruhan Dipohon (Ekar)</b>
                                            <td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->

                        <ul class="pagination">

                            <li class='page-link disabled'>
                                <a>Previous</a>
                            </li>

                            <li class='page-item active'><span class='page-link'>1<span
                                        class='sr-only'>(current)</span></span></li>
                            <li class='page-link disabled'>
                                <a>Next</a>
                            </li>
                        </ul>
            </section>
        </form>
    </div>




    </body>

    </html>
@endsection
