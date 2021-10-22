<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<!-- jquery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
	
	<title>Laravel Crawler Country List</title>
	<style>
		body {
		    font-family: 'Nunito', sans-serif;
		    min-height: 1500px;
		}

		span{
			text-align: center;
			border: none;
			/*display: none;*/
		}
		#page-selectors div:nth-child(2) {
			display: none;
		}

		h1, h2, h3, h4, h5, p {
			margin: 0;
		}


		ul{
			margin-bottom: 1em;
		}

		.list-group {
			margin-bottom: 1em;
		}

		li {
			list-style: none;
		}

		a:hover {
			font-weight: bold;
		}

		.nav-link{
			color: black;
		}

		.wrapper > .card:first-child .card-header {
			background: orange;
			color: white;
		}

		.wrapper > .card:nth-child(2) .card-header {
			background: green;
			color: white;
		}

		.wrapper > .card:nth-child(3) .card-header {
			background: red;
			color: white;
		}

		/*#country-list nav:nth-child(2) .hidden {
			display: none;
			background: red;

		}*/

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
	
	<h1 class="heading text-center">Covid Stats Country List</h1>
	<p class="col-md-6 offset-md-3 mt-5 wrapper">Click on any of the links below to see their stats on worldometer.com</p>
	<div class="row">
		<div id="country-list" class="col-md-6 offset-md-3  mt-5 wrapper">
			<ul class="list-group list-group-flush">
				<!-- attempt pagination with scraper data -->
				<?php 
					// print_r($paginators);
					// dd($paginators);
					// dd($paginators);

				 ?>
				 @foreach($paginators as $key => $value)
				 	<?php 

					 	$url = 'https://www.worldometers.info/coronavirus/' . $value;
					 	// $value = str_replace("country", "", $value);
					 	// $value = str_replace("/", "", $value);
					 	// // echo $url;
				 		// echo $key;
				 	?>

				 	<a class="list-group-item list-group-item-action" target="_blank" href="{{$url}}"><li>{{$key}}</li></a>

				 @endforeach
			</ul>
		</div>
	</div>
			<span id="page-selectors">{{ $paginators->links() }}</span>

	</div>
</body>
</html>
