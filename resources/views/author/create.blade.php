@extends('template.master')
@section('title','Create Author')
@section('content')
    @include('template.errors')
    @include('template.messages')
    <form method="post">
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
        {!! csrf_field() !!}
        <button type="submit" name="save-author" value="1">Save</button>
    </form>
@endsection