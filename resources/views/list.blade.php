<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<title>Laravel Scraper Results</title>
	<style>
		span{
			text-align: center;
		}



		ul{
			margin-bottom: 1em;
		}

		li {
			list-style: none;
		}

		a:hover {
			font-weight: bold;
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
<nav>
	<ul>
		<li><a href="/">Home</a></li>
	</ul>
</nav>
<div class="container">
	
	<h1 class="heading text-center">Country List: Coronavirus Stats</h1>
	<div class="row">
				
		<div class="col-md-6 offset-md-3 mt-5 wrapper">
			<ul class="list-group list-group-flush">
				@foreach($links as $link)
					<a class ="list-group-item list-group-item-action" href="{{$link['complete_url']}}"><li>{{$link['display_name']}} {{$link['autocomplete_tag']}}</li></a>
				@endforeach
			</ul>
			<span>
				{{$links->links()}}
			</span>
		</div>
	</div>

	</div>
</body>
</html>
