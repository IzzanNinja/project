@extends('navigation')
@section('navigation')
<h1>Daftar Entries</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Pemohon</th>
                <th>Tarikh</th>
                <!-- Add more columns if needed -->
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($daftars as $daftar)
                <tr>
                    <td>{{ $daftar->id }}</td>
                    <td>{{ $daftar->pemohon }}</td>
                    <td>{{ $daftar->tarikh }}</td>
                    <!-- Add more columns if needed -->
                    <td>
                        <a href="{{ url('/daftar/' . $daftar->id) }}">View</a>
                        <a href="{{ url('/daftar/' . $daftar->id . '/edit') }}">Edit</a>
                        <form action="{{ url('/daftar/' . $daftar->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
