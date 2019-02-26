<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Noto+Serif+JP" rel="stylesheet">
  <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
  <div class="container">
    @yield('content')
  </div>
</body>
</html>
