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
            <p class="col-md-8 offset-md-2 mt-5 wrapper">Please use the URL below to get up-to-date Covid-19 stats from Worldometer.com. </p>
            <p class="col-md-8 offset-md-2 mt-2 wrapper">The URL is provided for you in the input below. If you want to see worldwide stats, press Crawl.</p>
            <p class="col-md-8 offset-md-2 mt-2 wrapper">If you want to see stats from any country, press the Country selector to view the country search input.</p>
            
            <form action="scraper" class="col-md-8 offset-md-2 mt-5 mb-6" method="get">
                @csrf
                <div class="form-group mt-3">
                    <label for="url-input">Worldometer URL: 
                        <span style="color:red">
                            @error('url')

                                {{$message}}

                            @enderror
                        </span>
                </label>
                    <input id= "url-input" class="form-control" name="url" type="text" value="https://www.worldometers.info/coronavirus/">
                    
                </div>
                <div class="form-group mt-3">
                    <label>Choose how you want to search Covid-19 stats: </label><br>
                    <label for="worldwide">Worldwide: </label>
                    <input type="radio" id="worldwide" name="search-type" value="Worldwide" checked>
                    <label for="country">Country: </label>
                    <input type="radio" id="country" name="search-type" value="Country">
                </div>
                <div id="country-input-controls" class="form-group mt-3">
                    <label for="url-input">Type the name of the country to see its Covid-19 stats: 
                        <span style="color:red">
                            <?php   

                                $country_message = "The country field is required when 'Country' is selected.";
                             ?>
                            @error('country')

                                {{$country_message}}

                            @enderror
                        </span>
                    </label>
                    <input id="country-input" class="typeahead form-control" name="country" type="text">

                    
                </div>
                <input type="submit" class="btn btn-primary col-sm-4 offset-sm-4 mt-3 wrapper" name="submit" value="Crawl">
                <!-- ?php 
                    $result = DB::Table('links')->select('autocomplete_tag')->get();
                    print_r($result);
                    // $autosearch = DB::select('select autocomplete_tag from links ');
                    //             dd($autosearch);
                    // dd($autosearch);

                 ?> -->

            </form>
        </div>

        
    <!-- function to toggle country input display -->
    <script>
        let countryInput = document.getElementById('country-input-controls');

        let countrySelector = document.getElementById('country');

        let worldwideSelector = document.getElementById('worldwide');

        function hideCountryInput() {
            countryInput.style.display = "none";
        }

        function showCountryInput() {
            countryInput.style.display = "block";
        }

        worldwideSelector.addEventListener('click', hideCountryInput);

        countrySelector.addEventListener('click', showCountryInput);


    </script>
    </body>
</html>
