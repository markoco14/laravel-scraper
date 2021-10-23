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

class DataTwoController extends Controller
{
    public function dataTwo(Request $request) {
        // need to check if table doesn't exist
        // if doesn't exist, redirect to data-init page

       
        // put update code here
        $results = DB::select('select * from links');
        $values = json_decode(json_encode($results), true);
        // print_r($values);
        $array = array();
        // $results = array_values($results);
        $range = 0;
        for ($i = 51; $i <= 100; $i++) {
            // echo $values[$i]["complete_url"];
            // echo "<br>";

            $stats = new Client();
            $page = $stats->Request('GET', $values[$i]["complete_url"]);
            $stat = $page->filter('.maincounter-number')->each(function($item){
                // echo $item->text();
                $this->stats[$item->text()] = $item->text();
            });
            $dataD = $this->stats;

            $clean = array_values($dataD);
            
            array_splice($clean,0,$range);
            
            $stat = $clean;
            $range = $range + 3;
            $id = $i +1;
            DB::update(
                'update links set cases = ?, deaths = ?, recovered = ? where id = ?',
                    [$clean[0], $clean[1], $clean[2], $id]
            );

        }

        $message = "You have successfully updated the next 50 stats";

        // paginate from database
        $data=Link::simplePaginate(15);

        return view('data-two', ['count'=>50, 'message'=>$message, 'links'=>$data]);
    }
}

