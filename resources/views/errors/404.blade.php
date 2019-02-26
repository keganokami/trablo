@extends('layouts.style')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-heading"><h3>401エラー</h3></div>
                <div class="panel-body">
                  申し訳ございません
                  お探しのページは見つかりませんでした。

                    <a href="{{ route('login') }}" class="header-menu">ログイン</a>
                    からやり直してください。

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
