<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClusterToNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cluster_to_notes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cluster_id')->unsigned();
            $table->foreign('cluster_id')->references('id')->on('clusters');
            $table->integer('note_id')->unsigned();
            $table->foreign('note_id')->references('id')->on('notes');
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
        Schema::dropIfExists('cluster_to_notes');
    }
}
