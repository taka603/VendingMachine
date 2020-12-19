<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield("title")</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script>
        let money = document.getElementById('money');
    </script>
</head>
<body>
    <div id="wrapper">
        <div id="transparent">
            <header>
                <h1><img src="/images/vendingMachine.jpg" alt="自動販売機アイコン">Welcome to the VendingMachine<img src="/images/vendingMachine.jpg" alt="自動販売機アイコン"></h1>
            </header>
            <div class="flex-center position-ref full-height">
            @yield("content")
            </div>
        </div>      
    </div>
    <footer>
        <small>Copyright © 2020 All Rights Reserved.</small>
    </footer>
</body>
</html>
   