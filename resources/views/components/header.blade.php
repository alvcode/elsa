@php
    $domain = Config::get('app.url');
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        .parent-table{
            font-family: Arial;
        }
        body{
            padding: 0;
            margin: 0;
        }
        .container-table{
            border-collapse: collapse;
            border-radius: 30px;
            overflow: hidden;
            margin-top: 20px;
            padding-top: 10px;
        }
        .logo{
            text-align: center;
            margin: auto;
        }
        .logo img{
            width: 600px;
        }
        .market-button{
            width: 50px;
            height: 50px;
            border-radius: 30px;
            background-color: #0029FF;
            text-align: center;
        }
        .market-button a{
            display: block;
            width: 50px;
            height: 50px;
            border-radius: 30px;
            line-height: 65px;
        }
        .contact{
            width: 170px;
        }
        .contact-email{
            color: #0029FF;
            font-size: 18px;
            font-weight: 500;
        }
        .contact-phone{
            color: #2D2D2D;
            font-size: 18px;
            font-weight: 500;
            text-align: right;
        }
        .hr{
            height: 1px;
            background-color: #0029FF;
            border: none;
        }
        .logo-bottom{
            text-align: center;
        }
        .logo-bottom img{
            width: 180px;
        }
        .unsubscribe{
            text-align: center;
            color: #0029FF;
            font-size: 12px;
            font-weight: 500;
        }
    </style>
</head>