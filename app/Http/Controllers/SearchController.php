<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use App\Models\Link;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SearchController extends Controller
{
    public function search()
    {
        // $result = 
        // if (Schema::hasTable('datas')) {
        //     echo "You have a datas table";
        // } else {

        //     echo "There is no datas table";
        //     Schema::create('datas', function (Blueprint $table) {
        //                 $table->increments('id');
        //                 $table->string('name');
        //                 $table->string('airline');
        //                 $table->timestamps();
        //             });
        //     echo "But we made a table for you :)";
        // }
        return view('search');
    }

    // public function autocomplete(Request $request)
    // {
    //     $data = Link::select("display_name")
    //             ->where("display_name", "LIKE", "%".$request->get('query')."%")
    //             ->get();
    //     return response()->json($data);
    // }
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
