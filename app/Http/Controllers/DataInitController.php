<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Link;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DataInitController extends Controller
{
    // this controller will help the user initalize their table in the database
    // check if the table exists
        // if yes
            // check if there is data
                // if no, populate table with data
            // tell the user the table is ready
            // offer them link to search page
        // if no
            // tell them the table does not exist
            // offer them button to create table

    public function createTable() {

        $tableName = "links";
        // check if the table exists
        if(!Schema::hasTable($tableName)) {
            // create the table on this page but don't fill it with data
            Schema::create('links', function (Blueprint $table) {
                        $table->id();
                        $table->string('display_name');
                        $table->string('autocomplete_tag');
                        $table->string('complete_url');
                        $table->string('country_code');
                        $table->timestamps();
                    });

            // set variables to hold page content and links
            $paragraph = "We didn't find any tables with the name '{$tableName}' in your database so we created one. Please click 'GET DATA' below to get data for the table.";
            $linkText = "GET DATA";
            $linkUrl = "data-ready";
            // return data-init view with "table not found" variables
            return view('data-init', ['paragraph' => $paragraph, 'linkText' => $linkText, 'linkUrl' => $linkUrl]);
        } else {
            // set variables to hold page content and links
            $paragraph = "We found a table with the name '{$tableName}' in your database. Please click 'CHECK DATA' below to check the data in your table.";
            $linkText = "CHECK DATA";
            $linkUrl = "data-ready";
            // return data-init view with "table found" variables
            return view('data-init', ['paragraph' => $paragraph, 'linkText' => $linkText, 'linkUrl' => $linkUrl]);
        }
        

    }
}
