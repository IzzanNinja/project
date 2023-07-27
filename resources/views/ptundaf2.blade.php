@php
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Auth;

    // Get the logged-in user's nokp
    $nokp = Auth::user()->nokp;

    // Get the current year and the last year
    $currentYear = date('Y');
    $lastYear = $currentYear - 1;

    // Fetch data from 'tanah' table where 'nokppetani' matches the logged-in user's nokp and 'tarikh' is between the current and last year
    $tanah = DB::table('tanah')
        ->where('nokppetani', $nokp)
        ->whereBetween(DB::raw('YEAR(tarikh)'), [$lastYear, $currentYear])
        ->first();

    $petanibajak = DB::table('petanibajak')
        ->where('nokp', $nokp)
        ->first();
@endphp

@extends('navigation')
@section('navigation')
    <html>

    <head>
    </head>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

    <div class="back-button">
        <a href="{{ route('ptundaf') }}" class="btn btn-secondary" style="margin-top: 15px;margin-left: 15px;">Kembali</a>
    </div>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            {{-- <h1>
                Sistem Pembayaran Subsidi Pembajakan Sawah Padi
            </h1>
            <ol class="breadcrumb">
                <li><a href="index.php"><i class="fa fa-dashboard"></i> Laman Utama</a></li>
            </ol> --}}
        </section>

        <!-- Main content -->
        {{-- <form action="{{ route('ptundaf.update', ['petanibajak_id' => Auth::user()->id]) }}" method="POST"> --}}
            @csrf
            <section class="content">


                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><b>A. TUNTUTAN SUBSIDI PEMBAJAKAN (LUAR MUSIM)</b></h3>
                                </div>
                                <table id="tuntutan" class="table table-noborder table-hover">
                                    <tr>




                                            <td width="15%">1. Nama Pemohon</td>
                                            <td width="2%">:</td>
                                            <td width="83%"><input type="text" class="form-control" id="pemohon" name="pemohon" placeholder="Nama Pemohon" value="{{ $petanibajak->nama }}" readonly></td>

                                    </tr>
                                    <tr>

                                            <td>2. Kad Pengenalan</td>
                                            <td>:</td>
                                            <td><input type="text" class="form-control" id="nokp" name="nokp" placeholder="No.Kad Pengenalan" value="{{ $petanibajak->nokp }}" readonly></td>

                                        {{-- <input type="hidden" name="tahun" id="tahun" class="form-control" value=2021>
                                        <input type="hidden" name="nokp" id="nokp" class="form-control"
                                            value=751027125135>
                                        <input type="hidden" name="musimini" id="musimini" class="form-control" value=1>
                                        <input type="hidden" name="pohonid" id="pohonid" class="form-control" value=2148>
                                        </td> --}}
                                    </tr>
                                    <tr>

                                        <td>3. Alamat Perhubungan</td>
                                        <td>:</td>
                                        <td><input type="text" class="form-control" id="nokp" name="alamat" placeholder="alamat" value="{{ $petanibajak->alamat }} {{ $petanibajak->poskod }}" readonly></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <!--box primary-->
                        <div class="box box-primary">
                            <table width="96%" class="table table-noborder table-hover" id="details">
                                {{-- <tr>
                                    <td width="17%">No. Pendaftaran</td>
                                    <td width="2%">:</td>
                                    <td width="81%"><input type="text" class="form-control" id="user_id" name="user_id" placeholder="user_id" value="{{ Auth::user()->nopetani }}" readonly></td>
                                </tr> --}}
                                <tr>

                                    <td>Tarikh Permohonan</td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control" id="tarikh" name="tarikh" value="{{ date('d-m-Y') }}" readonly></td>
                                </tr>
                                <tr>
                                    <td>No. Geran</td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control" id="nogeran" name="nogeran" placeholder="No. Geran" value="{{ $tanah->nogeran }}" readonly></td></td>
                                </tr>
                                <tr>
                                    <td>Luas Permohonan (Ekar)</td>
                                    <td>:</td>
                                    <td>
                                        <div class="input-group">
                                            <input type="text" name="luas" id="luas" class="form-control"
                                                value="{{ $tanah->luaspohon }}" readonly>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Kampung</td>
                                    <td>:</td>
                                    <td>
                                        <input type="text" class="form-control" id="lokasi" name="lokasi" value="{{ DB::table('lokasitanah')->where('kodlokasi', $tanah->lokasi)->value('namalokasi') }} " readonly>
                                    </tr>
                                <tr>
                                    <td>Siap Bajak</td>
                                    <td>:</td>
                                    <td> <select class="form-control" name="bulan">
                                            <option value="">Sila pilih...</option>
                                            @foreach (DB::table('bulan')->get() as $bulan)
                                                <option value="{{ $bulan->kodbulan }}">{{ $bulan->bulan }}</option>
                                            @endforeach
                                        </select></td>
                                </tr>
                                <tr>
                                    <td>Tuntutan (RM)</td>
                                    <td>:</td>
                                    <td>
                                        <div class="input-group">

                                            <input type="text" name="tuntutan" id="tuntutan" class="form-control" value="approval by pegawai" readonly>

                                            {{-- <input type="hidden" name="subsidi" id="subsidi" class="form-control"
                                               >
                                            <input type="hidden" name="bilnya" id="bilnya" class="form-control"
                                                > --}}
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div class="box box-primary">
                            <table width="96%" class="table table-noborder table-hover" id="bayaran">
                                <tr>
                                    <td>No Akaun Bank</td>
                                    <td>:</td>
                                    <td>
                                        <div class="input-group">
                                            <input type="text" name="akaun" id="akaun" class="form-control" >
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nama Bank</td>
                                    <td>:</td>
                                    <td> <select class="form-control" name="daerah_id">
                                            <option value="">Sila pilih...</option>
                                            @foreach (DB::table('bank')->get() as $bank)
                                                <option value="{{ $bank->kodbank }}">{{ $bank->namabank }}</option>
                                            @endforeach
                                        </select></td>
                                </tr>
                                <tr>
                                    <td>Cawangan Bank</td>
                                    <td>:</td>
                                    <td> <select class="form-control" name="daerah_id">
                                            <option value="">Sila pilih...</option>
                                            @foreach (DB::table('daerah')->get() as $daerah)
                                                <option value="{{ $daerah->koddaerah }}">{{ $daerah->namadaerah }}</option>
                                            @endforeach
                                        </select></td>
                                </tr>
                            </table>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary" name="submit1" value="daftar">Daftar Tuntutan </button>

                            </button>
                        </div>
                    </div>
                    <!--box primary-->
                </div>
                <!--box-->
    </div>
    <!--col-xs-12-->
    </div>
    <!--row-->

    </section>
    </form>
    <!-- /.content -->

    </div>

    </body>

    </html>
@endsection
