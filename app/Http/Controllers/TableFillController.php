<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Link;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TableFillController extends Controller
{
    public function fillTable() {

        // echo "We found a table with the name tables";
        $users = DB::select('select * from tables');
        if (!$users) {
            echo "the datas table is empty";
        } else {
            echo "The tables table has data";
        }

        return view('data-ready');
    }
}
