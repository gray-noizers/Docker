@extends('layout')

@section('content')
    <div class="container">
        <div class="card mt-4">
            <div class="card-header">
                <h2>
                    {{$posts->title}}
                </h2>
            </div>
            <div class="card-image">
                <p>
                    @if($posts->image == null)
                        <img src="/storage/noimage.png">
                    @else
                        <img src="/storage/{{$posts->image}}">
                    @endif              
                </p>
            </div>
            <div class="card-body">
                <h4>
                    {{$posts->body}}
                </h4>
            </div>
            <div class="card-footer">
                <span>
                    
                    作品名:{{$posts->commic_title}}
                    <!--  いずれここもレビューに関連づけていきます  -->
                </span>
                <span>
                    投稿日時：{{$posts->created_at->format('Y-m-d')}}
                </span>
                <span>
                    投稿者：{{$user->name}}
                </span>
            </div>
        </div>
    </div>

    @auth
    <div class='text-right'> 
        {!!Form::open(['route'=>['posts.destroy',$posts->id],'method'=>'delete'])!!}
            <a class="btn btn-primary" href="{{route('posts.edit',['post_id'=>$posts->id])}}">
                編集する
            </a>

            {!!Form::submit('削除する',['class'=>'btn btn-danger'])!!}

        {!!Form::close()!!}
    </div>
    @endauth

@endsection('content')