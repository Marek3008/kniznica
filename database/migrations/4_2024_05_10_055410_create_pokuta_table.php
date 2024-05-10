<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('pokuta', function (Blueprint $table) {
        //     $table->smallIncrements('id');
        //     $table->unsignedSmallInteger('vypozicka_id');
        //     $table->tinyInteger('ciastka');
        //     $table->foreign('vypozicka_id')->references('id')->on('vypozicka');
        // });

        DB::statement('CREATE TABLE `pokuta` (
            `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
            `vypozicka_id` int(11) NOT NULL FOREIGN KEY REFERENCES vypozicka(id),
            `ciastka` int(2) NOT NULL
          )');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pokuta');
    }
};
