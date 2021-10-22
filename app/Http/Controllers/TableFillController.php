<?php

namespace App\Http\Controllers;

use Goutte\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Link;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TableFillController extends Controller
{
    public function fillTable(Request $request) {
        // need to check if table doesn't exist
        // if doesn't exist, redirect to data-init page

        // scrape data to put into table
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

        // capture the country name and the href into variables
        $dataA=$this->countries;
        $dataB=$this->hrefs;
        
        // combine data into key/value pair
        $scrapedData = array_combine($dataA, $dataB);
        // print_r($data);

        // echo "We found a table with the name tables";
        $data = DB::select('select * from links');
        $count = count($data);
        // print_r($count);
        // $tableCheck = 
        if ($count === 0) {
            // echo "the users table is empty";
            // echo "<br>";
            // echo "the count is " . $count;
            $date = date('Y-m-d H:i:s');
            // use foreach to loop through $data and create the variables for the database
            // then insert the data into the database
            // create variables to put into insert query
            foreach ($scrapedData as $key => $value) {
                $id = null;
                // echo $id;
                // echo "<br>";
                $display_name = $key;
                // echo $display_name;
                // echo "<br>";
                $autocomplete_tag = str_replace("country", "", $value);
                $autocomplete_tag = str_replace("/", "", $autocomplete_tag);
                // echo $autocomplete_tag;
                // echo "<br>";
                $complete_url = $url . $value;
                // echo $complete_url;
                // echo "<br>";
                $country_code = $value;
                // echo $country_code;
                // $total_cases = "45,000,000";
                DB::insert('insert into links (id, display_name, autocomplete_tag, complete_url, country_code, created_at, updated_at) values (?, ?, ?, ?, ?, ?, ?)', array($id, $display_name, $autocomplete_tag, $complete_url, $country_code, $date, $date));
            }
            // DB::insert('insert into links (id, display_name, autocomplete_tag, complete_url, country_code) values (?, ?, ?, ?, ?)', array($id, $display_name, $autocomplete_tag, $complete_url, $country_code));
            $count = count($scrapedData);
            return view('data-ready', ['count'=>$count]);
        } else {
            // echo "The table has data";
            // echo "<br>";
            // echo "the count is " . $count;
            return view('data-ready', ['count'=>$count]);
        }

    }
}


// $results = DB::select('select * from links');
//                 // print_r($results);
//                 // echo $results[0]["id"];
//                 // echo "<br>";

//                 if(!$results) {
//                     echo "No results found";
//                     foreach ($data as $key => $value) {
//                         $id = null;
//                         echo $id;
//                         echo "<br>";
//                         $display_name = $key;
//                         echo $display_name;
//                         echo "<br>";
//                         $autocomplete_tag = str_replace("country", "", $value);
//                         $autocomplete_tag = str_replace("/", "", $autocomplete_tag);
//                         echo $autocomplete_tag;
//                         echo "<br>";
//                         $complete_url = $url . $value;
//                         echo $complete_url;
//                         echo "<br>";
//                         $country_code = $value;
//                         echo $country_code;
//                         // $total_cases = "45,000,000";
//                         DB::insert('insert into links (id, display_name, autocomplete_tag, complete_url, country_code) values (?, ?, ?, ?, ?)', array($id, $display_name, $autocomplete_tag, $complete_url, $country_code));
//                     }

//                 }