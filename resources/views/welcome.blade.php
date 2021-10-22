<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Crawler Search</title>
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
              <li class="nav-item"><a class="nav-link" href="/search">Search</a></li>
              <li class="nav-item"><a class="nav-link"href="/list">Stats List</a></li>
           </ul>
       </nav>
       <div class="container">
           <h1 class="heading text-center">Covid Stats Crawler</h1>
           <!-- this works with get but not with post -->
           <div class="col col-md-8 offset-md-2">
               <p class="col-md-12 mt-5 wrapper">Welcome the Coronavirus Stats Crawler. For the best experience using the crawler, we recommend you make a data table to store your crawled results. </p> 
                <a href="/data-init" class="btn btn-primary col-md-4 offset-md-4 mt-3">
                    MAKE TABLE</a>
                <p class="col-md-12 mt-5 wrapper">You can still use the crawler without the data table. But you may lose some of the form autocomplete functions. </p>
                <a href="/search" class="btn btn-primary col-md-4 offset-md-4 mt-3">SEARCH DATA</a>
               
           </div>
           
        </div>
    
    </body>
</html>
