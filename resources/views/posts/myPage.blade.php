@extends('layouts.style')

@section('title', 'Blog Posts')

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
      <h4>{{ Auth::user()->name }} さんのページ</h4>
          {{ csrf_field() }}

      <table id="example" class="table table-striped table-hover" style="width:100%">
        <thead>
          <tr>
            <th class="col-xs-6 col-ms-6 col-md-6 col-lg-6">タイトル</th>
            <!-- <th class="col-xs-2 col-ms-2 col-md-2 col-lg-2">作者</th> -->
            <th class="col-xs-4 col-ms-4 col-md-4 col-lg-4">作成日</th>
            <th class="col-xs-1 col-ms-1 col-md-1 col-lg-1"></th>
            <th class="col-xs-1 col-ms-1 col-md-1 col-lg-1"></th>
          </tr>
        </thead>
        <tbody>
        @forelse ($posts as $post)
        @if ($post->email === Auth::user()->email)
          <tr>
           <td><a href="{{ action('myPostsController@show', $post->id) }}">{{ $post-> title }}</a></td>
           <!-- <td>{{ $post->userName }}</td> -->
           <td class="create_at">{{ $post->created_at }}</td>
           <td><a href="{{ action('myPostsController@edit', $post->id) }}" class="edit"><i class="fas fa-pen"></i></a></td>
           <td><i class="fas fa-trash-alt del" data-id="{{ $post->id }}"></i></td>
           <!-- <td><button type="button" class="del btn btn-danger" data-id="{{ $post->id }}">削除</button></td> -->
<!-- <button class="btn btn-info">編集</button> -->
           <form method="post" action="{{ url('/posts', $post->id) }}" id="form_{{ $post->id }}">
         {{ csrf_field() }}
         {{ method_field('delete') }}

       </form>
       </tr>
        @endif
      @empty
      <tr>
         <td><h3>No posts yet</h3></td>
      </tr>
      @endforelse
    </tbody>
  </table>
      </div>
</div>

<!-- <script src="{{ asset('js/main.js') }}"></script> -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- <script src="/js/main.js"></script> -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js">

</script>
<script src="/js/pagenation.js"></script>
<script src="/js/dataTable.js"></script>
@endsection
