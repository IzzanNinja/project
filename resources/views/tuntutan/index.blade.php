@extends('navigation')

@section('navigation')
    <h1>Tuntutan List</h1>
    <ul>
        @foreach($tuntutanItems as $tuntutanItem)
            <li>{{ $tuntutanItem->title }}</li>
        @endforeach
    </ul>
@endsection
