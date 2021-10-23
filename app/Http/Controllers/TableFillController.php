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
        
        // print_r($dataB);

        // foreach($dataB as $key => $value) {
        //     $statsUrl = $url . $value;
        //     echo $statsUrl;
        //     echo "<br>";
        // }

        // combine data into key/value pair
        $scrapedData = array_combine($dataA, $dataB);
        // print_r($scrapedData);
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

            // put update code here
            $results = DB::select('select * from links');
            $values = json_decode(json_encode($results), true);
            // print_r($values);
            $array = array();
            // $results = array_values($results);
            $range = 0;
            for ($i = 0; $i <= 50; $i++) {
                echo $values[$i]["complete_url"];
                echo "<br>";

                $stats = new Client();
                $page = $stats->Request('GET', $values[$i]["complete_url"]);
                $stat = $page->filter('.maincounter-number')->each(function($item){
                    // echo $item->text();
                    $this->stats[$item->text()] = $item->text();
                    // echo "<br>";
                    // $data=$this->stats;
                    // dd($data);
                });
                $dataD = $this->stats;
                // $cases = json_encode($dataD);
                // echo "Print dataD before reset";
                // echo "<br>";
                // // array_splice($dataD, 3);
                // print_r($dataD);
                // echo "<br>";

                $clean = array_values($dataD);
                // echo "Print clean before splice";
                // echo "<br>";
                // print_r($clean);
                // echo "<br>";
                
                array_splice($clean,0,$range);
                
                $stat = $clean;
                $range = $range + 3;
                DB::update(
                    'update links set cases = ?, deaths = ?, recovered = ? where id = ?',
                        [$clean[0], $clean[1], $clean[2], $id]
                );

            }

            $count = count($scrapedData);

            $message = "Your 'lists' table was empty. We have successfully crawled the data and stored it in your 'lists' table.";

            // paginate from database
            $data=Link::simplePaginate(15);


            return view('data-ready', ['count'=>$count, 'message'=>$message, 'links'=>$data]);
        } else {
            $message = "Your 'lists' table already had stats data.";
            // paginate from database
            // put update code here
            $results = DB::select('select * from links');
            $values = json_decode(json_encode($results), true);
            // print_r($values);
            $array = array();
            // $results = array_values($results);
            $range = 0;
            for ($i = 0; $i <= 50; $i++) {
                echo $i;
                $stats = new Client();
                $page = $stats->Request('GET', $values[$i]["complete_url"]);
                $stat = $page->filter('.maincounter-number')->each(function($item){
                    // echo $item->text();
                    $this->stats[$item->text()] = $item->text();
                    // echo "<br>";
                    // $data=$this->stats;
                    // dd($data);
                });
                $dataD = $this->stats;
                
                $clean = array_values($dataD);
                
                array_splice($clean,0,$range);


                $range = $range + 3;
                $id = $i +1;

                DB::update(
                    'update links set cases = ?, deaths = ?, recovered = ? where id = ?',
                        [$clean[0], $clean[1], $clean[2], $id]
                );
            }
        }
            $data=Link::simplePaginate(15);
            // print_r($data);
            // echo "The table has data";
            // echo "<br>";
            // echo "the count is " . $count;
            return view('data-ready', ['count'=>$count, 'message'=>$message, 'links'=>$data]);
    }

}


// $range = 0;
// for ($i = 51; $i <= 100; $i++) {
//     echo $i;
//     $stats = new Client();
//     $page = $stats->Request('GET', $values[$i]["complete_url"]);
//     $stat = $page->filter('.maincounter-number')->each(function($item){
//         // echo $item->text();
//         $this->stats[$item->text()] = $item->text();
//         // echo "<br>";
//         // $data=$this->stats;
//         // dd($data);
//     });
//     $dataD = $this->stats;
    
//     $clean = array_values($dataD);
    
//     array_splice($clean,0,$range);


//     $range = $range + 3;
//     $id = $i +1;

//     DB::update(
//         'update links set cases = ?, deaths = ?, recovered = ? where id = ?',
//             [$clean[0], $clean[1], $clean[2], $id]
//     );
// }
// $range = 0;
// for ($i = 101; $i <= 150; $i++) {
//     echo $i;
//     $stats = new Client();
//     $page = $stats->Request('GET', $values[$i]["complete_url"]);
//     $stat = $page->filter('.maincounter-number')->each(function($item){
//         // echo $item->text();
//         $this->stats[$item->text()] = $item->text();
//         // echo "<br>";
//         // $data=$this->stats;
//         // dd($data);
//     });
//     $dataD = $this->stats;
    
//     $clean = array_values($dataD);
    
//     array_splice($clean,0,$range);


//     $range = $range + 3;
//     $id = $i +1;

//     DB::update(
//         'update links set cases = ?, deaths = ?, recovered = ? where id = ?',
//             [$clean[0], $clean[1], $clean[2], $id]
//     );
// }
// $range = 0;
// for ($i = 151; $i <= 200; $i++) {
//     echo $i;
//     $stats = new Client();
//     $page = $stats->Request('GET', $values[$i]["complete_url"]);
//     $stat = $page->filter('.maincounter-number')->each(function($item){
//         // echo $item->text();
//         $this->stats[$item->text()] = $item->text();
//         // echo "<br>";
//         // $data=$this->stats;
//         // dd($data);
//     });
//     $dataD = $this->stats;
    
//     $clean = array_values($dataD);
    
//     array_splice($clean,0,$range);


//     $range = $range + 3;
//     $id = $i +1;

//     DB::update(
//         'update links set cases = ?, deaths = ?, recovered = ? where id = ?',
//             [$clean[0], $clean[1], $clean[2], $id]
//     );
// }
// $range = 0;
// for ($i = 201; $i <= 220; $i++) {
//     echo $i;
//     $stats = new Client();
//     $page = $stats->Request('GET', $values[$i]["complete_url"]);
//     $stat = $page->filter('.maincounter-number')->each(function($item){
//         // echo $item->text();
//         $this->stats[$item->text()] = $item->text();
//         // echo "<br>";
//         // $data=$this->stats;
//         // dd($data);
//     });
//     $dataD = $this->stats;
    
//     $clean = array_values($dataD);
    
//     array_splice($clean,0,$range);


//     $range = $range + 3;
//     $id = $i +1;

//     DB::update(
//         'update links set cases = ?, deaths = ?, recovered = ? where id = ?',
//             [$clean[0], $clean[1], $clean[2], $id]
//     );
// }