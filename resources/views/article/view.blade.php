@extends('template.master')
@section('title','Article View')
@section('content')
    <div id="article-view">Loading..</div>
@endsection
@section('scripts')
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>
    <script>
        getArticlesData('{{route('article.get', $id)}}', '#article-view', '{{$id}}');
    </script>
@endsection