<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield("title", "VendingMachine")</title>
    <!-- Fonts -->
    @if(app('env') == 'production') 
    <link href="{{ secure_asset('css/style.css') }}" rel="stylesheet">  <!-- 本番環境時のcss -->
    @else
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">     <!-- ローカル環境時のcss -->
    @endif
    <!-- タイトルバー画像表示 -->
    <link rel="icon" type="image/x-icon" href="/images/juice.jpg">
</head>
<body>
    <div id="wrapper">
        <div id="transparent">
            <header>
                <h1 class="titleLogo">Welcome to the VendingMachine</h1>
                <!-- ユーザー認証時 -->
                @auth
                <ul>
                    <li><a href="logout">ログアウト</a></li>
                </ul>
                <!-- ユーザー非認証時 -->
                @else
                <ul>
                    <li><a href="/login">ログイン</a></li>
                    <li><a href="/register">登録</a></li>
                </ul>
                @endauth
            </header>
            <main>
            @yield("content")
            </main>
        </div>      
    </div>
    <footer>
        <small>Copyright © 2020 All Rights Reserved.</small>
    </footer>
    <script>
        let money = document.getElementById('money');
    </script>
</body>
</html>
