<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<title>Laravel Scraper Results</title>
	<style>
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
<nav>
	<ul>
		<li><a href="/">Home</a></li>
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
	<div class="row">
		<div class="col-md-6 offset-md-3 mt-5 wrapper">
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