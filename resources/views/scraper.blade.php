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
	
	<title>Laravel Crawler Results</title>
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
		<?php 

			if($dataThree === "Worldwide") {
				$the_title = "Worldwide";
			} else {
				$h1_titles = array_values($dataThree);
				$the_title = $h1_titles[0];
			}
			// echo $h1_titles[0]; 
		?>
		<h1 class="heading text-center"><?php echo $the_title ?> Coronavirus Stats</h1>
		<div >
			<div class="col-sm-8 offset-sm-2 mt-5 wrapper">
				<?php 
					$combined_data = array_combine($data, $dataTwo);
					// print_r($combined_data);
					// echo $dataThree[" Iran"];
				?>
				@foreach($combined_data as $key => $value)
					<div class="card text-center mt-4">
				
						<h5 class="card-header">{{$key}}</h5>

					<div class="card-body">
						<p class="card-text">{{$value}}</p>
					</div>
				</div>
				@endforeach
				
			</div>
			<a class="btn btn-primary col-sm-4 offset-sm-4 mt-3 wrapper" href="/search">BACK TO SEARCH</a>
		</div>

	</div>
</body>
</html>


<!-- @foreach($data as $key => $value)
				
				
				<div class="card text-center mt-4">
					<h5 class="card-header">Title</h5>
					<div class="card-body">
						<p class="card-text">{{ $value }}</p>
					</div>
				</div>
			@endforeach -->