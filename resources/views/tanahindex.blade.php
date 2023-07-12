@php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



$tanah = DB::table('tanah')->where('pohonid', Auth::user()->id)->paginate(10);
@endphp

@extends('navigation')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@section('navigation')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Senarai Tanah</h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        {{ $tanah->links() }}
                        <a class="btn btn-success" style="float:right;margin-bottom: 15px;margin-right: 15px" href="{{ route('senaraitanah') }}">Tambah Tanah Baru</a>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="tanahTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th width="6%">Table ID</th>
                                    <th width="6%">Bilangan</th>

                                    <th width="6%">Bil ID</th>
                                    <th width="25%">Pohon ID</th>
                                    <th width="25%">Pemilik Geran</th>
                                    <th width="15%">No Geran</th>
                                    <th width="10%">Lokasi</th>
                                    <th width="10%">Luas Ekar</th>
                                    <th width="10%">Luas Pohon</th>
                                    <th width="15%">Pemilikan</th>
                                    <th width="10%">Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $counter = ($tanah->currentPage() - 1) * $tanah->perPage() + 1;
                                @endphp
                                @foreach($tanah as $item)
                                <tr>
                                    <td>{{ $item->table_id }}</td>
                                    <td>{{ $counter++}}</td>
                                    <td>{{ $item->bil }}</td>
                                    <td>{{ $item->pohonid }}</td>
                                    <td>{{ $item->pemilikgeran }}</td>
                                    <td>{{ $item->nogeran }}</td>
                                    <td>{{ DB::table('lokasitanah')->where('kodlokasi', $item->lokasi)->value('namalokasi') }}</td>
                                    <td>{{ $item->luasekar }}</td>
                                    <td>{{ $item->luaspohon }}</td>
                                    <td>{{ $item->pemilikan }}</td>
                                    <td style="text-align: center;">
                                        <a href="{{ route('edit-tanah', ['id' => $item->pohonid]) }}" class="btn btn-warning" style="margin-bottom: 10px;">Edit</a>

                                        <a href="{{ route('pet_cetak', ['table_id' => isset($tanah->table_id) ? $tanah->table_id : '']) }}" class="btn btn-info" style="margin-bottom: 10px;">PDF Cetak</a>

                                        <a href="{{ route('edit-tanah', ['id' => $item->pohonid]) }}" class="btn btn-primary" style="margin-bottom: 10px;">Tambah Geran</a>

                                        <a href="{{ route('tanah.delete', ['id' => $item->table_id, 'success' => true]) }}" class="btn btn-danger" style="margin-bottom: 10px;" onclick="return confirm('Are you sure you want to delete this?')">Padam</a>
                                    </td>


                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>






                        <tr>
                            <th width="6%"></th>
                            <th width="25%">JUMLAH</th>
                            <th width="11%"></th>
                            <th width="15%"></th>
                            <th width="15%"></th>
                            <th width="15%"></th>
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
                {{ $tanah->links() }}

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
