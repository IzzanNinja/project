@extends('navigation')

@section('navigation')
    <h1>Edit Tuntutan</h1>
    <form method="POST" action="{{ route('tuntutan.update', ['id' => $tuntutanItem->id]) }}">
        @csrf
        @method('PUT')
        <!-- Form fields -->
        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="{{ $tuntutanItem->title }}">
        <br>
        <label for="description">Description</label>
        <textarea name="description" id="description">{{ $tuntutanItem->description }}</textarea>
        <br>
        <button type="submit">Update</button>
    </form>
@endsection
