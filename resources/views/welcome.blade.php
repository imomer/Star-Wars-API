<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Star Wars API</title>

        <link rel="icon" href="/favicon.png">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #000;
                color: #fff;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
                flex-direction: column;
            }

            .position-ref {
                position: relative;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 64px;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .logo img {
                width: 320px;
            }
        </style>
    </head>
    <body>
    <div class="flex-center position-ref full-height">
        <div class="logo">
            <img src="/images/Star_Wars_Logo.svg" alt="">
        </div>
        <div class="content">
            <div class="title m-b-md">
                API
            </div>
        </div>
    </div>
    </body>
</html>
