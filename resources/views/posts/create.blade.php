@extends('layouts.style')

@section('title', 'New Post')

@section('content')


<div class="container">
  <ul class="menu">
    <li class="brand">
      <i class="fas fa-angle-double-right"></i>
    </li>
     <li class="menu-item">
       <i class="fa fa-home" aria-hidden="true"></i><a href="{{ url('/') }}" class="header-menu">home</a></li>
     </li>
     <li class="menu-item">
       <i class="fas fa-blog" aria-hidden="true"></i><a href="{{ url('/posts/create') }}" class="header-menu">New Post</a>
     </li>
     <li class="menu-item">
       <i class=" fas fa-user" aria-hidden="true"></i><a href="{{ url('/posts/myPage') }}" class="header-menu">myPage</a>
     </li>
     <li class="menu-item">
       <i class=" fas fa-sign-out-alt" aria-hidden="true"></i><a href="{{ url('logout') }}" class="header-menu">logout</a>
     </li>
  </ul>

  <!-- <a href="{{ url('/') }}" class="header-menu">Back</a> -->

  <div class="contents">
  <h1>新しい投稿</h1>
<form method="post" action="{{ url('/posts') }}">
  {{ csrf_field() }}
  <p>
    <div class="form-group">
    <input class="form-control" type="text" name="title" placeholder="enter title" value="{{old('title')}}">
    <input class="form-control" type="hidden" name="userName" placeholder="enter title" value="{{ Auth::myuser()->name }}">
    <input class="form-control" type="hidden" name="email" placeholder="enter title" value="{{Auth::myuser()->email}}">
    </div>
    @if ($errors->has('title'))
    <span class="error">{{ $errors->first('title')}}</span>
    @endif

  </p>

    <div class="form-group">
      <textarea class="form-control" rows="20" name="body" placeholder="enter body" value="{{old('body')}}"></textarea>
    </div>
    @if ($errors->has('body'))
    <span class="error">{{ $errors->first('body')}}</span>
    @endif
  </p>
  <p>
    <button class="btn btn-primary btn-md submit-on" type="submit" value="Add">投稿</button>
  </p>
</form>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="/js/doubleSubmitStop.js"></script>
@endsection
