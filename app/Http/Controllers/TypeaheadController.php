<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use App\Models\Link;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TypeaheadController extends Controller
{
    public function index()
    {
        
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
        return view('welcome');
    }

    public function autocomplete(Request $request)
    {
        $data = Link::select("display_name")
                ->where("display_name", "LIKE", "%".$request->get('query')."%")
                ->get();
        return response()->json($data);
    }
}
