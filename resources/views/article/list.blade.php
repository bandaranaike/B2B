@extends('template.master')
@section('title','Articles')
@section('content')
    <div id="article-list">Loading..</div>
@endsection
@section('scripts')
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>
    <script>
        getArticlesData('{{route('article.list.get')}}', '#article-list', false);
    </script>
@endsection