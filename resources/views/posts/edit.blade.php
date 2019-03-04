@extends('layouts.style')

@section('title', 'edit Post')

@section('content')
<div class="container">
  <ul class="menu">
    <li class="brand">
      <i class="fas fa-angle-double-right"></i>
    </li>
     <li class="menu-item">
       <i class="fa fa-home" aria-hidden="true"></i><a href="{{ url('/') }}" class="header-menu">ホーム</a></li>
     </li>
     <li class="menu-item">
       <i class="fas fa-blog" aria-hidden="true"></i><a href="{{ url('/posts/create') }}" class="header-menu">投稿する</a>
     </li>
     <li class="menu-item">
       <i class=" fas fa-user" aria-hidden="true"></i><a href="{{ url('/posts/myPage') }}" class="header-menu">マイページ</a>
     </li>
     <li class="menu-item">
       <i class=" fas fa-sign-out-alt" aria-hidden="true"></i><a href="{{ url('logout') }}" class="header-menu">ログアウト</a>
     </li>
  </ul>

    <!-- <a href="{{ url('/') }}" class="header-menu">Back</a> -->
    <div class="contents">
    <h4>記事の編集</h4>

  <form method="post" action="{{ url('/posts' , $post->id) }}">
    {{ csrf_field() }}
     {{ method_field('patch') }}
     <p>
       <input class="form-control" type="text" name="title" placeholder="enter title" value="{{ old('title', $post->title) }}">
       @if ($errors->has('title'))
       <span class="error">{{ $errors->first('title') }}</span>
       @endif
     </p>
     <p>
       <textarea class="form-control" rows="20" name="body" placeholder="enter body">{{ old('body', $post->body) }}</textarea>
       @if ($errors->has('body'))
       <span class="error">{{ $errors->first('body') }}</span>
       @endif
     </p>
    <p>
    <button class="btn btn-primary btn-md" type="submit" value="Add">内容を反映</button>
    </p>
  </form>
</div>
</div>

@endsection
