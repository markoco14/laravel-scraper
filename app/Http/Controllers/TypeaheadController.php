<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Link;

class TypeaheadController extends Controller
{
    public function index()
    {
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
