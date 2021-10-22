<?php 

namespace App\Http\Controllers;

use Goutte\Client;
use Illuminate\Http\Request;
use App\Models\Link;
// use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;


class ListScraperController extends Controller {

	// don't need $request variable for getting form data
	// can just define the URL within the function
	// use Client to request the page data

	public function list(Request $request) {
		$url = 'https://www.worldometers.info/coronavirus/';
		$client = new Client();
		$page = $client->Request('GET', $url);
		// print_r($page);
		$href = $page->filter(".mt_a")->each(function($item){
			$this->hrefs[$item->attr('href')] = $item->attr('href');
		});

		$country = $page->filter(".mt_a")->each(function($item){
			$this->countries[$item->text()] = $item->text();
		});

		//////////////////////
		// trying to scrape the total case data
		// come back later
		// $case = $page->filter(".odd")->each(function($item){
		// 	$this->cases[$item->text()] = $item->text();
		// });
		// dd($case);
		// $dataC=$this->cases;
		// dd($dataC);
		//////////////////////
		
		// capture the country name and the href into variables
		$dataA=$this->countries;
		$dataB=$this->hrefs;
		
		// combine data into key/value pair
		$data = array_combine($dataA, $dataB);
		ksort($data);
		// calculate number of items in $data (220)
		$total = count($data);
		// make page number request
		$page = $request->page ?? 1;
		// choose how many results per page
		$perPage = 20;
		// determine how many items need to be "skipped" on current page
		$offset = ($page - 1) * $perPage;
		// create a sliced array to pass to the paginator
		$items = array_slice($data, $offset, $perPage);
		// dd($items);

		$paginators = new \Illuminate\Pagination\LengthAwarePaginator($items, $total, $perPage);
		$localUrl = 'http://localhost:8000/list';
		// use setPath() to prevent going back to the main page
		// when each "next page"/"prev page button is pressed"
		$paginators->setPath($localUrl);

		// $request->url(),
		// 		'query' => $request->query()

		// dd($paginate);
		// print_r($data);
		// return view('list', ['links' => $paginate]);
		return view('list', compact('paginators'));
		// return new LengthAwarePaginator($items, $total, $perPage, $page, [
		// 		'path' => $request->url(),
		// 		'query' => $request->query()
		// ]);
	}

}


// use Goutte\Client;
// use Illuminate\Http\Request;
// use App\Models\Link;
// use Paginator;
// 		$data=Link::simplePaginate(15);
