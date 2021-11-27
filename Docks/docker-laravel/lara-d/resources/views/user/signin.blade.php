@extends('layout')

@section('content')
    <div class="container my-4">
        <div class="border p-4">
            <h5 class="mb-4">
                ログイン画面
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

        {!!Form::open(['route'=>'users.login'])!!}
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
                {!!Form::submit('ログイン',['class'=>'btn btn-primary'])!!}
            </div>
        {!!Form::close()!!}


    </div>

@endsection('content')