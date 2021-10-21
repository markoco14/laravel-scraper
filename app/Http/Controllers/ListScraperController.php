<?php 

namespace App\Http\Controllers;

use Goutte\Client;
use Illuminate\Http\Request;
use App\Models\Link;
use Paginator;


class ListScraperController extends Controller {

	// don't need $request variable for getting form data
	// can just define the URL within the function
	// use Client to request the page data

	public function list() {
		// $url = 'https://www.worldometers.info/coronavirus/';
		// $client = new Client();
		// $page = $client->Request('GET', $url);
		// // print_r($page);
		// $href = $page->filter(".mt_a")->each(function($item){
		// 	$this->hrefs[$item->attr('href')] = $item->attr('href');
		// });

		// $country = $page->filter(".mt_a")->each(function($item){
		// 	$this->countries[$item->text()] = $item->text();
		// });

		// // $case = $page->filter(".odd")->each(function($item){
		// // 	$this->cases[$item->text()] = $item->text();
		// // });
		// // dd($case);
		


		// // print_r($link);
		// $dataA=$this->countries;
		// $dataB=$this->hrefs;
		// // $dataC=$this->cases;
		// // dd($dataC);
		// $data = array_combine($dataA, $dataB);
		// // print_r($data);
		// return view('list', compact('data'));
		$data=Link::simplePaginate(15);
		return view('list', ['links' => $data]);
	}

}
