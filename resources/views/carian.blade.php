@extends('navigation')

@section('navigation')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Sistem Pembayaran Subsidi Pembajakan Sawah Padi
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Laman Utama</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <br>
        <div class="center">
            <br>
            <table id="carikon" class="table table-bordered table-hover">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">CARIAN SATUS PERMOHONAN BERDASARKAN <BR>NO.KAD PENGENALAN</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <form class="search-form" method="post" action="{{ route('carian') }}">
                                    @csrf
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control"
                                            placeholder="No.Kad Pengenalan" value="{{Auth::user()->nokp}}" readonly>
                                        <div class="input-group-btn">
                                            <button type="submit" name="submit1" class="btn btn-danger btn-flat">Cari
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <input type="text" name="tahun" class="form-control" placeholder="Tahun">
                                    </div>
                                    <!-- /.input-group -->
                                </form>
                            </div> <!-- /.box-body -->
                        </div> <!-- /.box -->
                    </div><!--/.col (right) -->
                </div>
                <!-- /.row -->

                <!-- Display search results -->
                @if(isset($searchResults) && !$searchResults->isEmpty())
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Search Results</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    {{-- <th style="width: 1%">Bil</th> --}}
                                    <th style="width: 1%">Tarikh</th>



                                    <th width="10%">NO KP Petani</th>
                                    <th width="10%">Luas Ekar</th>
                                    <th width="10%">Luas Pohon</th>
                                    <th width="15%">Pemilikan</th>
                                    <th width="15%">Jumlah Tuntutan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($searchResults as $result)
                                <tr>
                                    <td>{{$result->tahunpohon }}</td>
                                    <td>{{$result->nopetani }}</td>
                                    <td>{{$result->pemilikgeran }}</td>
                                    <td>{{$result->nogeran }}</td>
                                    <td>{{$result->luaspohon }}</td>
                                    <td>
                                        @if($result->amaunlulus)
                                            Sudah Diluluskan (RM {{$result->amaunlulus}})
                                        @else
                                            Sedang Diproses
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif
                <!-- End of display search results -->
            </table>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- ... (rest of the content) ... -->
@endsection
