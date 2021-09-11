<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}">
    <title>Tài Xỉu Online</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,600" rel="stylesheet" type="text/css">
    <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<div id="app">
    <app></app>
</div>

<script src="{{asset('js/app.js')}}"></script>
</body>
</html>
