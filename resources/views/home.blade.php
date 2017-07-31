@extends('template.master')
@section('title','Welcome B2B')
@section('content')
    <a href="{{route('author.create')}}">Create Author</a>
    <a href="{{route('article.create')}}">Create Article</a>
@endsection