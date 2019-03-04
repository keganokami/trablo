@extends('layouts.style')

@section('title', $post->title)

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
<div class="contents">
        <h4>投稿内容</h4>
  <div class="card">
    <div class="card-body bg-light" >
      <h3 class="card-title">タイトル：{{ $post->title }}</h3>
      <p class="card-author">作成者：{{ $post->userName }}</p>
      <p class="card-create-date-time">作成日時：{{ $post->created_at }}</p>
      <p class="card-text">{!! nl2br(e($post->body)) !!}</p>
    </div>
  </div>
  <div class="comment-title">
    <h5>コメント</h5>
  </div>
  <table class="table table-hover">
    <thead>
      <th class="col-xs-5 col-ms-5 col-md-5 col-lg-5"></th>
      <th class="col-xs-2 col-ms-2 col-md-2 col-lg-2">投稿者</th>
      <th class="col-xs-1 col-ms-1 col-md-1 col-lg-1"></th>
    </thead>


    <div class="comment-section">
      <tbody>
        @forelse ($post->comments as $comment)
        <tr>
          <td>{{ $comment->body }}</td>
          <td>{{ $comment->userName }}</td>
          @if ($comment->email === Auth::user()->email)
          <td><i class="fas fa-trash-alt del" data-id="{{ $comment->id }}"></i></td>
          <form method="post" action="{{ action('CommentsController@destroy', [$post, $comment]) }}" id="form_{{ $comment->id }}">
            {{ csrf_field() }}
            {{ method_field('delete') }}
          </form>
          @else
            <td></td>
          @endif

      @empty
          <li>No comments yet</li>

        </tr>
          @endforelse
      </tbody>
    </table>

<form method="post" action="{{ action('CommentsController@store', $post) }}">
  {{ csrf_field() }}
  <p>
    <input class="form-control" type="hidden" name="userName" placeholder="enter title" value="{{ Auth::user()->name }}">
    <input class="form-control" type="hidden" name="email" value="{{ Auth::user()->email }}">
    <textarea class="form-control" rows="3" type="text" name="body" placeholder="enter comment" value="{{ old('body') }}"></textarea>
    @if ($errors->has('body'))
    <span class="error">{{ $errors->first('body') }}</span>
    @endif
  </p>
  <p>
    <button class="btn btn-primary btn-md" type="submit" value="Add">コメントする</button>
  </p>
</form>
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="/js/doubleSubmitStop.js"></script>

@endsection
