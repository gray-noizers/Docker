<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>みんなの漫画レビュー</title>
</head>
<body>

    <header class="navbar navbar-center bg-danger">
        <div class="container">
            <a class="mx-auto" href="{{route('top')}}">
                <img src="http://sngk.net/5ujs1E/img1" alt="">
            </a>
        </div>
    </header>

    <main class="bg-warning">
        @yield('content')
    </main>

    
    <footer class="footer bg-dark">
        <div class="container">
            <p class="text-white text-right">
                ©︎Nakaminami Mirai 2021
            </p>
        </div>
    </footer>
    
</body>
</html>