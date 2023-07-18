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

        <div class="card">
            <div class="card-body">
                <a class="btn btn-success float-left mr-2 mb-3" href="{{ route('senaraitanah') }}">Tambah Tanah Baru</a>                {{ $tanah->links() }}<div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Bil</th>
                                <th>Pemilik Geran</th>
                                <th>No Geran</th>
                                <th>Status</th>
                                <th>Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $counter = ($tanah->currentPage() - 1) * $tanah->perPage() + 1;
                            @endphp
                            @foreach($tanah as $item)
                            <tr data-widget="expandable-table" aria-expanded="false">
                                <td>{{ $counter++ }}</td>
                                <td>{{ $item->pemilikgeran }}</td>
                                <td>{{ $item->nogeran }}</td>
                                <td><span class="badge bg-danger">Belum Tuntut</span></td>
                                <td>                                         <a href="{{ route('edit-tanah', ['id' => $item->table_id]) }}" class="btn btn-warning" style="margin-bottom: 10px;">Edit</a>

                                    <a href="{{ route('pet_cetak', ['table_id' => isset($tanah->table_id) ? $tanah->table_id : '']) }}" class="btn btn-info" style="margin-bottom: 10px;">PDF Cetak</a>
                                     <a href="{{ route('tanah.delete', ['id' => $item->table_id, 'success' => true]) }}" class="btn btn-danger" style="margin-bottom: 10px;" onclick="return confirm('Are you sure you want to delete this?')">Padam</a>

                                     <a href="#" class="btn btn-primary" style="margin-bottom: 10px;" id="uploadButton">Tambah Geran</a></td>
                            </tr>
                            <tr class="expandable-body d-none">
                                <td colspan="5">
                                    <div>
                                        <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <input type="file" name="file">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Upload File</button>
                                        </form>

                                    </div>
                                    <div>
                                        <p>
something to put here for future reference etc                                        </p>
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

{{-- @push('scripts')
<script>
    $(document).ready(function() {
        $('tr[data-widget="expandable-table"]').click(function() {
            $(this).next('.expandable-body').toggleClass('d-none');
            $(this).attr('aria-expanded', function(index, attr) {
                return attr === 'true' ? 'false' : 'true';
            });
        });

        document.getElementById('uploadButton').addEventListener('click', function(event) {
            event.preventDefault();
            document.getElementById('uploadForm').style.display = 'block';
        });
    });
</script>
@endpush --}}






