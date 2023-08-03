@php
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Auth;

    // Get the logged-in user's nokp
    $nokp = Auth::user()->nokp;

    // Get the current year
    $currentYear = date('Y');

    // Fetch latest data from 'tanah' table where 'nokppetani' matches the logged-in user's nokp and 'tarikh' year is the current year
    $tanah = DB::table('tanah')
        ->select('tanah.*', 'pemilikgeran', 'nogeran', 'luaspohon', 'bil')
        ->where('tanah.nokppetani', $nokp)
        ->whereYear('tanah.tarikh', $currentYear)
        ->latest('tarikh') // Order by 'tarikh' column in descending order (latest date first)
        ->first();



    // Get the location name from the 'lokasi' field of the latest 'tanah' record
    if ($tanah) {
        $locationName = $tanah->lokasi;
        $nogeran = $tanah->nogeran;
    } else {
        $locationName = ''; // Handle the case when no 'tanah' record is found
        $nogeran = '';
    }
@endphp

@extends('navigation')
@section('navigation')
    <html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    </head>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <div class="back-button">
            <a href="{{ route('ptundaf') }}" class="btn btn-secondary" style="margin-top: 15px;margin-left: 15px;">Kembali</a>
        </div>
        <!-- Content Header (Page header) -->
        <section class="content-header">

        </section>

        <!-- Main content -->
        <form action="{{ route('ptundaf.edit', ['petanibajak_id' => Auth::user()->id]) }}" method="POST">
            @csrf
            <section class="content container-fluid">

                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><b>TUNTUTAN SUBSIDI PEMBAJAKAN </b></h3>
                                </div>
                                <table id="tuntutan" class="table table-bordered table-hover">

                                    <tr>
                                        <td width="25%">1. Nama Pemohon</td>
                                        <td width="5%">:</td>
                                        <td width="70%"><input type="text" class="form-control" id="nama"
                                                name="nama" placeholder="Nama Pemohon"
                                                value="{{ $userData && $userData->nama ? $userData->nama : Auth::user()->nama }}"
                                                readonly></td>

                                    </tr>
                                    <tr>
                                        <td>2. Kad Pengenalan</td>
                                        <td>:</td>
                                        <td><input type="text" class="form-control" id="nokp" name="nokp"
                                                placeholder="No.Kad Pengenalan"
                                                value="{{ $userData && $userData->nokp ? $userData->nokp : Auth::user()->nokp }}"
                                                readonly></td>
                                    </tr>
                                    <tr>
                                        <td width="25%">No. Petani</td>
                                        <td width="5%">:</td>
                                        <td width="70%"><input type="text" class="form-control" id="user_id"
                                                name="user_id" placeholder="user_id"
                                                value="{{ $userData && $userData->nopetani ? $userData->nopetani : Auth::user()->nopetani }}"
                                                readonly></td>
                                    </tr>
                                    <tr>
                                        <td>3. Alamat Perhubungan</td>
                                        <td>:</td>
                                        <td><input type="text" class="form-control" id="nokp" name="alamat"
                                                placeholder="alamat"
                                                value="{{ $userData && $userData->alamat ? $userData->alamat : Auth::user()->alamat }} {{ $userData && $userData->nama ? $userData->poskod : Auth::user()->poskod }}"
                                                readonly></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="daerah">Daerah :</label>
                                        </td>
                                        <td>:</td>
                                        <td>
                                            <select class="form-control" name="daerah">
                                                <option value="">Sila pilih...</option>
                                                @foreach (DB::table('daerah')->get() as $daerah)
                                                    <option value="{{ $daerah->koddaerah }}"
                                                        {{ DB::table('petanibajak')->where('nokp', Auth::user()->nokp)->value('daerah') == $daerah->koddaerah ? 'selected' : '' }}>
                                                        {{ $daerah->namadaerah }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <br>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <!-- Maklumat Geran -->
                        <div class="box box-primary">
                            <table width="100%" class="table table-bordered table-hover" id="geran">
                                <tr>
                                    <th colspan="3">Maklumat Geran</th>
                                </tr>
                                <tr>
                                    <td width="25%">Nama Pemilik Geran</td>
                                    <td width="5%">:</td>
                                    <td width="70%"><input type="text" class="form-control" id="nama" name="nama"
                                            placeholder="Nama Pemohon"
                                            value="{{ $tanah->pemilikgeran }}"
                                            readonly></td>
                                </tr>
                                <tr>
                                    <td width="25%">Bil Geran</td>
                                    <td width="5%">:</td>
                                    <td width="70%"><input type="text" class="form-control" id="nama" name="nama"
                                            placeholder="Nama Pemohon"
                                            value="{{ $tanah->bil}}"
                                            readonly></td>
                                </tr>
                                <tr>
                                    <td><label for="stesen">Jabatan :</label></td>
                                    <td>:</td>
                                    <td>
                                        <select class="form-control" name="stesen">
                                            <option value="">Sila pilih...</option>
                                            @foreach (DB::table('stesen')->get() as $stesen)
                                                <option value="{{ $stesen->stationcode }}"
                                                    {{ DB::table('petanibajak')->where('nokp', Auth::user()->nokp)->value('stesen') == $stesen->stationcode ? 'selected' : '' }}>
                                                    {{ $stesen->stationdesc }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>No. Geran</td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control" id="nogeran" name="nogeran"
                                            placeholder="No. Geran" value="{{ $tanah ? $tanah->nogeran : '' }}"
                                            readonly></td>
                                </tr>
                                <tr>
                                    <td>Luas Permohonan (Ekar)</td>
                                    <td>:</td>
                                    <td>
                                        <div class="input-group">
                                            <input type="text" name="luas" id="luas" class="form-control"
                                                value="{{ $tanah && $tanah->luaspohon ? $tanah->luaspohon : Auth::user()->luaspohon }}"
                                                readonly>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Kampung</td>
                                    <td>:</td>
                                    <td>
                                        <input type="text" class="form-control" id="lokasi" name="lokasi"
                                            value="{{ $locationName }}" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tahun Pohon</td>
                                    <td>:</td>
                                    <td>
                                        <input type="text" class="form-control" id="tahunpohon" name="tahunpohon"
                                            value="{{ \Carbon\Carbon::now()->format('Y') }}" readonly>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <!-- Maklumat Tuntutan -->
                        <div class="box box-primary">
                            <table width="100%" class="table table-bordered table-hover" id="bayaran">
                                <tr>
                                    <th colspan="3">Maklumat Tuntutan</th>
                                </tr>
                                <tr>
                                    <td>Siap Bajak</td>
                                    <td>:</td>
                                    <td>
                                        <select class="form-control" name="bulan">
                                            <option value="">Sila pilih...</option>
                                            @foreach (DB::table('bulan')->get() as $bulan)
                                                <option value="{{ $bulan->kodbulan }}">{{ $bulan->bulan }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tuntutan (RM)</td>
                                    <td>:</td>
                                    <td>
                                        <div class="input-group">
                                            <input type="text" name="tuntutan" id="tuntutan" class="form-control"
                                                value="{{ $tanah->luaspohon * 200 }}" >
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>No Akaun Bank</td>
                                    <td>:</td>
                                    <td>
                                        <div class="input-group">
                                            <input type="text" name="akaun" id="akaun" class="form-control">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nama Bank</td>
                                    <td>:</td>
                                    <td>
                                        <select class="form-control" name="bank">
                                            <option value="">Sila pilih...</option>
                                            @foreach (DB::table('bank')->get() as $bank)
                                                <option value="{{ $bank->kodbank }}">{{ $bank->namabank }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Cawangan Bank</td>
                                    <td>:</td>
                                    <td>
                                        <select class="form-control" name="daerah_id">
                                            <option value="">Sila pilih...</option>
                                            @foreach (DB::table('daerah')->get() as $daerah)
                                                <option value="{{ $daerah->koddaerah }}">{{ $daerah->namadaerah }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tarikh Permohonan</td>
                                    <td>:</td>
                                    <td>
                                        <input type="date" class="form-control" id="tarpohon" name="tarpohon"
                                            value="{{ $tarikhMemohon }}">
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary" name="submit" value="submit">Kemaskini
                                Tuntutan</button>
                        </div>
                    </div>
                </div>
            </section>
        </form>
    </div>
    <!-- /.content -->
    </div>
    </body>

    </html>
@endsection
