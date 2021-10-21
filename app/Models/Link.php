<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    // table name
    // can manually set table name with "protected $table = 'my_flights';""
    
    // primary key
    // if table does not use "id" but "flight_id" or "user_id" you can specify this with:
    // "protected "$primaryKey = 'flight_id';" 
    // or "protected $primaryKey = 'user_id';"

    // created_at and updated_at
    // done by default, but you can turn that off with "public $timestamps = false;" (bool)

    // queries can be written simply
    // foreach (Flight::all() as $flight) {
    // echo $flight->name;
    // }

    // tables can be created, but I don't think that goes here
    // use Illuminate\Database\Schema\Blueprint;
    // use Illuminate\Support\Facades\Schema;

    // Schema::create('users', function (Blueprint $table) {
    //     $table->id();
    //     $table->string('name');
    //     $table->string('email');
    //     $table->timestamps();
    // });

    // you may also check if a schema exists
    // if (Schema::hasTable('users')) {
    //     // The "users" table exists...
    // }
}
