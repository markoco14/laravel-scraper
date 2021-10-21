<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Styles -->
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }

            .form-group {
                margin-bottom: 1em;
            }  

            #country-input-controls {
                display: none;
            }
        </style>
    </head>
    <nav>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/list">Stats List</a></li>
        </ul>
    </nav>
    <body class="antialiased">
        <div class="container">
            <h1 class="heading text-center">Welcome to the Laravel Scraper</h1>
            <!-- this works with get but not with post -->
            
            <form action="scraper" class="col-md-6 offset-md-3" method="get">
                @csrf
                <div class="form-group">
                    <label for="url-input">Worldometer URL: 
                        <span style="color:red">
                            @error('url')

                                {{$message}}

                            @enderror
                        </span>
                </label>
                    <input id= "url-input" class="form-control" name="url" type="text" value="https://www.worldometers.info/coronavirus/">
                    
                </div>
                <div class="form-group">
                    <label>Choose how you want to search Covid-19 stats: </label><br>
                    <label for="worldwide">Worldwide: </label>
                    <input type="radio" id="worldwide" name="search-type" value="Worldwide" checked>
                    <label for="country">Country: </label>
                    <input type="radio" id="country" name="search-type" value="Country">
                </div>
                <div id="country-input-controls" class="form-group">
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
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="submit" value="Crawl">
                </div>
                <!-- ?php 
                    $result = DB::Table('links')->select('autocomplete_tag')->get();
                    print_r($result);
                    // $autosearch = DB::select('select autocomplete_tag from links ');
                    //             dd($autosearch);
                    // dd($autosearch);

                 ?> -->

            </form>
        </div>


        

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
