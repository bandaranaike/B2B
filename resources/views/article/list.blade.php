@extends('template.master')
@section('title','Articles')
@section('content')
    <h1>Articles</h1>
    <div id="article-list">Loading..</div>
    <div class="modal fade" id="confirm">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Warning!</h4>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">No, Keep it</button>
                    <button type="button" class="btn btn-primary" id="delete">Yes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('js/app.js')}}"></script>
    <script>
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>
    <script src="{{asset('js/script.js')}}"></script>
    <script>
        getArticlesData('{{route('article.list.get')}}', '#article-list', false);
        deleteArticle('{{route('article.delete')}}');
    </script>
@endsection