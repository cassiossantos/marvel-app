<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Marvel characters</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            body{
                padding: 30px 0px;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                /* padding: 0 25px; */
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                margin-right: 15px;
            }

            .m-b-md {
                margin-bottom: 30px;
                
            }
            .container--header{
                border-bottom: 1px solid #e4e4e4;
                padding-bottom: 15px;
            }
           
          .container--content{
            padding: 20px 0px;
           }

           .card:hover{
               transition: .5s;
               transform: scale(1.05);
               opacity: .7;
           }

           .card{
               margin-bottom: 30px;
           }
         

        </style>
    </head>
    <body>
        <div class="container">
            <div class="container--header">
                <h1 class="container--header-title">
                    Welcome!
                </h1>
                <p class="container--header-subtitle">
                    Here you will find your favorite Marvel character
                </p>
            </div>
            <div class="container--content">
                @yield('content')
            </div>
        </div>
    </body>
    <script>
        
        const a = document.querySelectorAll('.links a');
        a.forEach(link =>  {
            let href = link.getAttribute("href")
            link.addEventListener('click', function(event){
                event.preventDefault();
                window.open(href)
            })
        })
    </script>
</html>
