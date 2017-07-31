@extends('template.master')
@section('title','Manage Article')
@section('content')
    @include('template.errors')
    @include('template.messages')
    <form method="{{$method}}">
        <div class="">
            <label for="author">Author</label>
            <select name="author_id" id="author" class="">
                @foreach($authors as $author)
                    <option value="{{$author->id}}">{{$author->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{old('title', $article->title)}}">
        </div>
        <div class="">
            <label for="url">Url</label>
            <input type="text" name="url" id="url" value="{{old('url', $article->url)}}">
        </div>
        <div class="">
            <label for="content">Content</label>
            <textarea name="content" id="content">{{old('content', $article->content)}}</textarea>
        </div>
        {!! csrf_field() !!}
        <button type="submit" name="save-article" value="1">Save</button>
    </form>
@endsection