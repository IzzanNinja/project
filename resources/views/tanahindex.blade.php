@php
    use Illuminate\Support\Facades\DB;
    $tanah = DB::table('tanah')->where('pohonid', Auth::user()->id)->paginate(10);

    // $userData = DB::table('tanah')->where('pohonid', Auth::user()->id)->first();
@endphp


@extends('navigation')

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
                        <a class="btn btn-success" style="float:right;" href="{{ route('senaraitanah') }}">Tambah Tanah Baru</a>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="tanahTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th width="6%">Bil</th>
                                    <th width="25%">Pohon ID</th>
                                    <th width="25%">Pemilik Geran</th>
                                    <th width="15%">No Geran</th>
                                    <th width="10%">Lokasi</th>
                                    <th width="10%">Luas Ekar</th>
                                    <th width="10%">Luas Pohon</th>
                                    <th width="15%">Pemilikan</th>
                                    <th width="10%">No Petani</th>
                                    <th width="10%">Tarikh</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tanah as $item)
                                <tr>
                                    <td>{{ $item->bil }}</td>
                                    <td>{{ $item->pohonid }}</td>
                                    <td>{{ $item->pemilikgeran }}</td>
                                    <td>{{ $item->nogeran }}</td>
                                    <td>{{ $item->lokasi }}</td>
                                    <td>{{ $item->luasekar }}</td>
                                    <td>{{ $item->luaspohon }}</td>
                                    <td>{{ $item->pemilikan }}</td>
                                    <td>{{ $item->nopetani }}</td>
                                    <td>{{ $item->tarikh }}</td>
                                    {{-- <td>{{ DB::table('tanah')->where('pohonid', Auth::user()->id)->value('bil') }}</td>
                                    <td>{{ DB::table('tanah')->where('pohonid', Auth::user()->id)->value('pohonid') }}</td>
                                    <td>{{ DB::table('tanah')->where('pohonid', Auth::user()->id)->value('pemilikgeran') }}</td>
                                    <td>{{ DB::table('tanah')->where('pohonid', Auth::user()->id)->value('nogeran') }}</td>
                                    <td>{{ DB::table('tanah')->where('pohonid', Auth::user()->id)->value('lokasi') }}</td>
                                    <td>{{ DB::table('tanah')->where('pohonid', Auth::user()->id)->value('luasekar') }}</td>
                                    <td>{{ DB::table('tanah')->where('pohonid', Auth::user()->id)->value('luaspohon') }}</td>
                                    <td>{{ DB::table('tanah')->where('pohonid', Auth::user()->id)->value('pemilikan') }}</td>
                                    <td>{{ DB::table('tanah')->where('pohonid', Auth::user()->id)->value('nopetani') }}</td>
                                    <td>{{ DB::table('tanah')->where('pohonid', Auth::user()->id)->value('tarikh') }}</td> --}}
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>

                                {{-- <div class="row">
                                    <div class="col-md-12">
                                        <div class="card card-default">
                                            <div class="card-body">
                                                <form action="/target" class="dropzone"
                                                    id="myDropzone">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="btn-group w-100">
                                                                <span
                                                                    class="btn btn-success col fileinput-button">
                                                                    <i class="fas fa-plus"></i>
                                                                    <span>Tambah fail</span>
                                                                </span>
                                                                <button type="button"
                                                                    class="btn btn-primary col start">
                                                                    <i
                                                                        class="fas fa-upload"></i>
                                                                    <span>Mula Muatnaik</span>
                                                                </button>
                                                                <button type="button"
                                                                    class="btn btn-warning col cancel">
                                                                    <i
                                                                        class="fas fa-times-circle"></i>
                                                                    <span>Batal Muatnaik</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </th>

 --}}




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
