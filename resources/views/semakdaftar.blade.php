@extends('navigation')

@section('navigation')
<div class="container">
    @if(isset($daftars) && count($daftars) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>IC</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($daftars as $key => $daftar)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $daftar->pemohon }}</td>
                        <td>{{ $daftar->nokp }}</td>
                        <td>{{ $daftar->nokad }}</td>
                        <td>
                            <a href="{{ route('daftar.edit', ['id' => $daftar->id]) }}">Edit</a>
                            <a href="">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-danger">No application yet</p>
    @endif
</div>

@endsection
