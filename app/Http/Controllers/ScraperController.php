<?php


namespace App\Http\Controllers;

use Goutte\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


// the post/get is being submitted
// but the value seems to be empty
// or the array key does not exist
// even print_r() wont show output
$urlname = 'https://www.worldometers.info/coronavirus/';

class ScraperController extends Controller
{
    // private $results = array();
    // private $h1s = array();
    // private $numbers = array();

    public function scraper(Request $request)
    {


        $request->validate([
                'url'=>'required',
                'search-type'=>'required'
        ]);

        if ($request->get( key: 'search-type') === "Country") {

            $request->validate([
                'country'=>'required'
            ]);
        }

        // Get url param for scraping
        $url = $request->get( key: 'url');
        $search_type = $request->get( key: 'search-type');
        $country = $request->get( key: 'country');

        // I can try to just convert the country to the country code from the database
        $countryCode = DB::select('select autocomplete_tag from links where display_name = :display_name', ['display_name' => $country]);

        // use Client to request the data
        // test conditional statement
        // if search type is worldwide
        // or for a specific country
        if ($search_type == "Worldwide") {
              // init Goutte
            $client = new Client();
            $page = $client->request('GET', $url);

            $heading = $page->filter('#maincounter-wrap>h1')->each(function($item){
                // filter again to catch the h1 tags
                $this->headings[$item->text()] = $item->text();
            });

            $number = $page->filter('.maincounter-number')->each(function($item){
                // filter again to catch the h1 tags
                $this->numbers[$item->text()] = $item->text();
            });

            $data = $this->headings;
            $dataTwo = $this->numbers;  
            $dataThree = $search_type;
            // dd($dataThree);
            return view('scraper', compact('data', 'dataTwo', 'dataThree')); 
        } else {
            // init Goutte
            $url = $url . strtolower($search_type) . "/" . strtolower($countryCode[0]->{'autocomplete_tag'});
            // dd($url);
            $client = new Client();
            $page = $client->request('GET', $url);


            $title = $page->filter('h1')->each(function($item){
                $this->titles[$item->text()] = $item->text();
            });

            $heading = $page->filter('#maincounter-wrap>h1')->each(function($item){
                // filter again to catch the h1 tags
                $this->headings[$item->text()] = $item->text();
            });

            $number = $page->filter('.maincounter-number')->each(function($item){
                // filter again to catch the h1 tags
                $this->numbers[$item->text()] = $item->text();
            });

            $data = $this->headings;
            $dataTwo = $this->numbers;
            $dataThree = $this->titles;

            return view('scraper', compact('data', 'dataTwo', 'dataThree'));

        }






        // // init Goutte
        // $client = new Client();
        // $page = $client->request('GET', $url);


        // $title = $page->filter('h1')->each(function($item){
        //     $this->titles[$item->text()] = $item->text();
        // });

        // $heading = $page->filter('#maincounter-wrap>h1')->each(function($item){
        //     // filter again to catch the h1 tags
        //     $this->headings[$item->text()] = $item->text();
        // });

        // $number = $page->filter('.maincounter-number')->each(function($item){
        //     // filter again to catch the h1 tags
        //     $this->numbers[$item->text()] = $item->text();
        // });

        // $data = $this->headings;
        // $dataTwo = $this->numbers;
        // $dataThree = $this->titles;

        // return view('scraper', compact('data', 'dataTwo', 'dataThree'));
       



        // // this code worked for all but returned the number value for both $key and $value variable
        // $page->filter('#maincounter-wrap>h1')->each(function($item){
        //         $this->results[$item->text()] = $item->text();

        // });

        // this old code only worked for the root site
        // it didn't work when "country/{place}"
        // was appended to the url

        // $filtered = $page->filter('#maincounter-wrap')->each(function($item){
        //     // filter again to catch the h1 tags
        //     $this->results[$item->filter('h1')->text()] = $item->filter('.maincounter-number')->text();
        //     });

        // $data = array_merge($h1,$number);
        // print_r($filtered);

        // $data = $this->headings;
        // $dataTwo = $this->numbers;
        // $dataThree = $this->titles;

        // return view('scraper', compact('data', 'dataTwo', 'dataThree'));




    }
}


// private $results = array();
// public function scraper()
// {
//     global $urlname;
//     // echo $urlname;
//     $client = new Client();
//     $url = 'https://www.worldometers.info/coronavirus/';
//     $page = $client->request('GET', $url);

//     // filter first by container id
//     $page->filter('#maincounter-wrap')->each(function($item){
//             // filter again to catch the h1 tags
//             $this->results[$item->filter('h1')->text()] = $item->filter('.maincounter-number')->text();
//     });


//     // here is where we turn the results into a variable that can be passed to the scraper.blade.file
//     // we don't want to use the return method here
//     // that's why the DOM elements from scraper.blade didnt work
//     // return $this->results;
//     $data = $this->results;
//     // echo $data;
//     // return $data;

//     // here we return which view we want to send the data to
//     // and we choose which data we want to compant
//     // I need to look up what compact() does.. but I imagine it is compacting the data
//     return view('scraper', compact('data'));
// }