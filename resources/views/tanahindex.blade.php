@php
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Auth;

    // Get the logged-in user's nokp
$nokp = Auth::user()->nokp;

// Get the last year the data exists in the 'tanah' table
$lastYearQuery = DB::table('tanah')
    ->where('nokppetani', $nokp)
    ->orderBy('tarikh', 'desc') // Order the results by 'tarikh' in descending order
    ->value(DB::raw('YEAR(tarikh)')); // Get the year value of the first row's 'tarikh' column (last year data exists)

    // Fetch data from 'tanah' table where 'nokppetani' matches the logged-in user's nokp and 'tarikh' is in the last year
$tanah = DB::table('tanah')
    ->where('nokppetani', $nokp)
    ->whereYear('tarikh', $lastYearQuery)
        ->get();
@endphp

@extends('navigation')

@if (session('success'))
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
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-success float-left mr-2 mb-3" href="{{ route('senaraitanah') }}">Tambah Tanah Baru</a>
                    <a href="{{ route('pet_cetak', ['table_id' => isset($item->table_id) ? $item->table_id : '']) }}"
                        class="btn btn-info" style="margin-bottom: 10px;"
                        onclick="return confirm('Teruskan ke Cetakan Borang PP13.1')">Cetak Borang PP13.1</a>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Bil</th>
                                    <th>Pemilik Geran</th>
                                    <th>No Geran</th>
                                    <th>Status</th>
                                    <th>Tahun Mohon</th>
                                    <th>Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $counter = 1;
                                @endphp
                                @foreach ($tanah as $index => $item)
                                    <tr data-toggle="collapse" data-target="#expandableRow{{ $index }}"
                                        aria-expanded="false" aria-controls="expandableRow{{ $index }}">
                                        <td>{{ $counter++ }}</td>
                                        <td>{{ $item->pemilikgeran }}</td>
                                        <td>{{ $item->nogeran }}</td>
                                        <td><span class="badge bg-danger">Belum Tambah Geran</span></td>
                                        <td>{{ date('Y', strtotime($item->tarikh)) }}</td>
                                        <td>
                                            <a href="{{ route('tanah.delete', ['id' => $item->table_id, 'success' => true]) }}" class="btn btn-danger" style="margin-bottom: 10px;" onclick="return confirm('Are you sure you want to delete this?')">Padam</a>

                                            <a href="#" class="btn btn-primary" style="margin-bottom: 10px;">Tambah
                                                Geran</a>
                                        </td>
                                    </tr>
                                    <tr class="collapse" id="expandableRow{{ $index }}">
                                        <td colspan="5">
                                            <div>
                                                <form action="{{ route('upload') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group">
                                                        <input type="file" name="file" accept=".pdf" required>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Muatnaik fail</button>
                                                    <small>*PDF sahaja</small>
                                                </form>
                                            </div>
                                            <div>
                                                <p>something to put here for future reference etc</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>


                        </table>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
