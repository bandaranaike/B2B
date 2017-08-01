@extends('template.master')
@section('title','Create Author')
@section('content')
    <h1>Create new author</h1>
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-4">
            @include('template.errors')
            @include('template.messages')
            <div class="form-group">
                <span class="text-danger">*</span> Required fields
            </div>
            <form method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{old('name')}}" class="form-control">
                </div>
                {!! csrf_field() !!}
                <button type="submit" name="save-author" value="1" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@endsection