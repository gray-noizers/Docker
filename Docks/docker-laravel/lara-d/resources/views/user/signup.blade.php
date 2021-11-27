@extends('layout')

@section('content')
    <div class="container my-4">
        <div class="border p-4">
            <h5 class="mb-4">
                ユーザーの新規登録
            </h5>
        </div>

        @if ($errors->any())
            <div>
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {!!Form::open(['route'=>'users.registration'])!!}
            <div class="form-group">
                {!!Form::label('name','ニックネーム')!!}
                {!!Form::text('name',old('name'),['class'=>'form-control'])!!}
            </div>

            <div class="form-ground">
                {!!Form::label('email','メールアドレス')!!}
                {!!Form::text('email',old('email'),['class'=>'form-control'])!!}
            </div>

            <div class="form-ground">
                {!!Form::label('password','パスワード')!!}
                {!!Form::text('password',old('password'),['class'=>'form-control'])!!}
            </div>

            <div class="mt-4">
                <a class="btn btn-danger" href="{{route('top')}}">
                    キャンセル
                </a>
                {!!Form::submit('登録する',['class'=>'btn btn-primary'])!!}
            </div>
        {!!Form::close()!!}


    </div>

@endsection('content')