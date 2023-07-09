@php
    use Illuminate\Support\Facades\DB;
    $user_id = DB::table('daftar')->where('user_id', Auth::user()->id)->value('user_id');
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
                        <h3 class="box-title">Create Tanah</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('senaraitanah.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="bil">Bil</label>
                                <input type="text" class="form-control" id="bil" name="bil" placeholder="Bil">
                            </div>

                            <div class="form-group">
                                <label for="pohonid">Pohon ID</label>
                                <input type="text" class="form-control" id="pohonid" name="pohonid"
                                value="{{ $user_id }}" readonly>
                            </div>


                                <div class="form-group">
                                    <label for="nama_pemilik">Nama Pemilik</label>
                                    <input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik">
                                </div>
                                <div class="form-group">
                                    <label for="no_geran">No.Geran</label>
                                    <input type="text" class="form-control" id="no_geran" name="no_geran">
                                </div>
                                <div class="form-group">
                                    <label for="lokasi_tanah">Lokasi Tanah</label>
                                    <select class="form-control" id="lokasi_tanah" name="lokasi_tanah">
                                        <option value="">Sila pilih...</option>
                                        @foreach (DB::table('lokasitanah')->get() as $lokasi)
                                            <option value="{{ $lokasi->kodlokasi }}">{{ $lokasi->namalokasi }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="luas_dalam_geran">Luas Dalam Geran (Ekar)</label>
                                    <input type="text" class="form-control" id="luas_dalam_geran" name="luas_dalam_geran">
                                </div>
                                <div class="form-group">
                                    <label for="luas_dipohon">Luas Dipohon/Musim (Ekar)</label>
                                    <input type="text" class="form-control" id="luas_dipohon" name="luas_dipohon">
                                </div>
                                <div class="form-group">
                                    <label for="pemilikan_tanah">Pemilikan Tanah</label>
                                    <select class="form-select" id="pemilikan_tanah" name="pemilikan_tanah">
                                        <option value="0">Sila Pilih...</option>
                                        <option value="1">Sendiri</option>
                                        <option value="2">Sewa</option>
                                        <option value="3">Tuntut Waris</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>


                            <!-- Add more form fields for other tanah properties -->

                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
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
