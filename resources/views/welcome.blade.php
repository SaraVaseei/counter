<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Counter</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
            html {
                line-height: 1.15;
                -webkit-text-size-adjust: 100%
            }

            body {
                font-family: 'Nunito', sans-serif;
                margin: 0;
                background-image: linear-gradient(
                    90deg
                    , rgba(244,37,243,1) 1.4%, rgba(244,87,1,1) 36.2%, rgba(255,204,37,1) 72.2%, rgba(20,196,6,1) 113% );
            }

            html {
                font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
                line-height: 1.5
            }

            *, :after, :before {
                box-sizing: border-box;
                border: 0 solid #e2e8f0
            }

            button {
                cursor: pointer;
            }

        </style>

        <script>
            $(document).ready(function () {
                $('#adder').click(function () {

                    var newValue = parseInt($("#adder-lbl").text()) + 1;
                    $("#adder-lbl").text(newValue);

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: window.location.origin + "/cache",
                        method: "post",
                        data: {counterValue: newValue},
                        success: function (data) {
                        }
                    });
                })
            });
        </script>
    </head>
    <body class="antialiased">
        <div style="text-align: center; margin-top: 20%">
            <h1>Counter</h1>
            <label id="adder-lbl">{{$counterValue}}</label>
            <button id="adder">+</button>
        </div>
    </body>
</html>
