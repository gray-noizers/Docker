@extends('layout')

@section('content')
    <div class="container">
        <div>
            @auth
                <a class="btn btn-primary mt-4" href="{{route('posts.create')}}">
                    レビューを投稿する！
                </a>
                <a class="btn btn-primary mt-4" href="{{route('auth.logout')}}">
                    ログアウト
                </a>
            @endauth
        </div>

        <div>
            @guest
                <a class="btn btn-primary mt-4" href="{{route('auth.login')}}">
                    ログイン
                </a>
            
                <a class="btn btn-primary mt-4" href="{{route('auth.register')}}">
                    新規登録
                </a>
            @endguest
        </div>

        <div class="card mt-4">
            @foreach ($posts as $post)
            <div class="card-header">
                <h2>
                    {{$post->title}}
                </h2>
            </div>
            <div class="card-body">
                <p>
                    @if($post->image == null)
                        <img src="/storage/noimage.png">
                    @else
                        <img src="{{ Storage::url($post->file_path) }}">
                        
                    @endif
                </p>

                <a href="{{route('posts.show',['post_id'=>$post->id])}}" class="card-link">
                    詳細を見る
                </a>
            </div>
            <div class="card-footer">
                <span>
                    作品名：
                    {{$post->commic_title}}
                </span>
            </div>
            @endforeach
        </div>
    </div>
@endsection('content')