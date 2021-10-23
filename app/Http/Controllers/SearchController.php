<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use App\Models\Link;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Goutte\Client;
use Illuminate\Support\Facades\DB;


class SearchController extends Controller
{
    public function search()
    {
       
        // print_r($results);
        return view('search');
    }
}

// $statsUrl = $url . $country_code;
// echo $statsUrl;
// echo "<br>";
// $statsClient = new Client();
// $statsPage = $statsClient->Request('GET', $statsUrl);

// $stat = $statsPage->filter('.maincounter-number')->each(function($item){
// //     // filter again to catch the h1 tags
//     $this->stats[$item->text()] = $item->text();
// });
// // echo "it worked";
// $dataD = $this->stats;
// // dd($dataD);
// $statsArray = array_values($dataD);
// // dd($headingArray);
// // dd($dataD, $statsArray);
// // $dataE = array_combine($dataC, $dataD);
// // dd($dataE);
// // dd($dataD);
// print_r( $statsArray);echo "<br>";
// // $cases = $statsArray[0];
// // $recovered = $statsArray[1];
// // $deaths = $statsArray[2];
// // echo $cases;
// // echo "<br>";
// // echo $recovered;
// // echo "<br>";
// // echo $deaths;
// // echo "<br>";
// // $dataC[0]->{'autocomplete_tag'}
