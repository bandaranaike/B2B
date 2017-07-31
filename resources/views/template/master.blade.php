<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','B2B')</title>
</head>
<body>
<ul class="">
    <li><a href="{{route('author.create')}}">Create Author</a></li>
    <li><a href="{{route('article.create')}}">Create Article</a></li>
    <li><a href="{{route('article.list.show')}}">Articles</a></li>
</ul>
@yield('content')
@yield('scripts')
</body>
</html>