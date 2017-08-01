@extends('template.master')
@section('title','Manage Article')
@section('content')
    <h1>Create new article</h1>
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-4">
            @include('template.errors')
            @include('template.messages')
            <div class="form-group">
                <span class="text-danger">*</span> Required fields
            </div>
            <form method="post">
                <div class="form-group">
                    <label for="author">Author <span class="text-danger">*</span></label>
                    <select name="author_id" id="author" class="form-control">
                        @foreach($authors as $author)
                            <option value="{{$author->id}}"{{old('author_id', $article->author_id) == $author->id ? 'selected':''}}>{{$author->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="title">Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" id="title" value="{{old('title', $article->title)}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="url">Url <span class="text-danger">*</span></label>
                    <input type="text" name="url" id="url" value="{{old('url', $article->url)}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="content">Content <span class="text-danger">*</span></label>
                    <textarea name="content" id="content" class="form-control">{{old('content', $article->content)}}</textarea>
                </div>
                {!! csrf_field() !!}
                <input type="hidden" name="_method" value="{{$method}}"/>
                <button type="submit" name="save-article" value="1" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@endsection