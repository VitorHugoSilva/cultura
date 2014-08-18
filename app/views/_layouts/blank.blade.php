<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>

    {{ HTML::style('assets/bootstrap/css/bootstrap.min.css') }}
    {{ HTML::style('assets/font-awesome/css/font-awesome.min.css') }}
</head>

<body>

@section('conteudo')
@show

{{ HTML::script('assets/jquery/jquery-2.1.1.min.js') }}
{{ HTML::script('assets/bootstrap/js/bootstrap.min.js') }}

</body>
</html>