@extends('navigation')

@section('navigation')
    <h1>Tuntutan Details</h1>
    <h2>{{ $tuntutanItem->title }}</h2>
    <p>{{ $tuntutanItem->description }}</p>
    <a href="{{ route('tuntutan.edit', ['id' => $tuntutanItem->id]) }}">Edit</a>
@endsection
