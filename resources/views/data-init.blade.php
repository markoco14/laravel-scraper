<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Crawler Init</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <!-- jquery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
        
        <!-- Styles -->
        <style>
            body {
                font-family: 'Nunito', sans-serif;
                min-height: 1000px;
            }

            nav a {
                color: black;
            }

            span {
                text-align: center;
            }

            h1, h2, h3, h4, h5, p {
                margin: 0;
            }

            ul{
                margin-bottom: 1em;
            }
            li{
                list-style: none;
            }

            a:hover {
                font-weight: bold;
            }

            .nav-link{
                color: black;
            }


            /*.form-group {
                margin-bottom: 1em;
            }  */

            #country-input-controls {
                display: none;
            }
        </style>
    </head>
    <body class="antialiased">
       <nav class="navbar justify-content-end">
           
           <ul class="navbar">
            
           <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
           <li class="nav-item"><a class="nav-link"href="/list">Stats List</a></li>

           </ul>
       </nav>

       
        <div class="container">
            <h1 class="heading text-center">Data Table Setup</h1>
            <!-- this works with get but not with post -->
            <p class="col-md-6 offset-md-3 mt-5 wrapper">{{$paragraph}}</p>
            <a class="btn btn-primary col-md-3 offset-md-3 mt-5 wrapper" href="{{$linkUrl}}">{{$linkText}}</a>
        </div>

        

  
    </body>
</html>
