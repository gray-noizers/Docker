@extends('layout')

@section('content')
    <div class="container my-4">
        <div class="border p-4">
            <h5 class="mb-4">
                レビューの編集
            </h5>

            @if ($errors->any())
            <div>
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            {!!Form::open(['route'=>['posts.update',$post->id],'method'=>'put'])!!}
                <div class="form-group">
                    {!!Form::label('title','タイトル')!!}
                    {!!Form::text('title',old('title'),['class'=>'form-control'])!!}
                </div>
                <div class="form-group">
                    {!!Form::label('image','画像')!!}
                    {{Form::file("image")}}
                </div>
                <div class="form-group">
                    {!!Form::label('body','本文')!!}
                    {!!Form::textarea('body',old('body'),['class'=>'form-control'])!!}
                </div>

                <div class="form-group">
                    {!!Form::label('commic_title','漫画のタイトル')!!}
                    {{Form::text('commic_title',old('commic_title'),['class'=>'form-control'])}}
                </div>
                

                <div class="mt-4">
                    <a class="btn btn-secondary" href="{{route('posts.show',['post_id'=>$post->id])}}">
                        キャンセル
                    </a>
                    {!!Form::submit('更新する',['class'=>'btn btn-primary'])!!}
                </div>
            {!!Form::close()!!}
        </div>
    </div>

@endsection('content')