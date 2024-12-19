<!DOCTYPE html>
<html>
<head>
    <title>Laravel CRUD Application</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
        }

        .left-menu {
            background-color: #333;
            color: #fff;
            width: 200px;
            height: 100vh;
            padding: 20px;
            box-sizing: border-box;
        }

        .menu-item {
            margin-bottom: 10px;
        }

        .menu-item a {
            text-decoration: none;
            color: #fff;
        }

        .content {
            flex-grow: 1;
            padding: 20px;
        }
    </style>
    <body>
        <div class="row" style="width:100%;">
        <div class="col-sm-2">
        <div class="left-menu">
            <div class="menu-item"><a href="{{ url('test') }}">Product List</a></div>
            <div class="menu-item"><a href="{{ url('sale') }}">Sale List</a></div>
            <div class="menu-item"><a href="{{ url('contact') }}">Contact</a></div>
            <div class="menu-item"><a href="{{ url('about') }}">About</a></div>
            <div class="menu-item"><a href="{{ url('setting') }}">Setting</a></div>
        </div>
        </div>
        <div class="col-sm-10">
            <div style="margin:10px;">
                @yield('content')
            </div>
        </div>
        </div>
    
    </body>
</html>