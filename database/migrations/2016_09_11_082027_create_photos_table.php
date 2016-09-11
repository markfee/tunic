<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // A photo means a single full sized copy in the primary location
        Schema::create('photos', function(Blueprint $table) {
            $table->increments("id");
            $table->string('filename')->unique(); // include sub path eg 2016/2016-05/123456.jpg
            $table->integer('width');     // The original width  (in the fullsize folder)
            $table->integer('height');      // The original height (in the fullsize folder)
            $table->dateTime('time_taken'); // The time the photo was taken
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('photos');
    }
}
