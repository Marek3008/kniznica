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
        // Schema::create('vypozicka', function (Blueprint $table) {
        //     $table->smallIncrements('id');
        //     $table->smallInteger('kniha');
        //     $table->unsignedSmallInteger('citatel_id');
        //     $table->date('odhadovany_datum_vratenia');
        //     $table->date('datum_vypozicky');
        //     $table->date('datum_vratenia');

        //     $table->foreign('kniha')->references('isbn')->on('kniha');
        //     $table->foreign('citatel_id')->references('id')->on('citatel');
        // });

        DB::statement('CREATE TABLE `vypozicka` (
            `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
            `kniha` int(13) NOT NULL FOREIGN KEY REFERENCES kniha(isbn),
            `citatel_id` int(11) NOT NULL FOREIGN KEY REFERENCES citatel(id),
            `odhadovany_datum_vratenia` date DEFAULT NULL,
            `datum_vypozicky` date DEFAULT NULL,
            `datum_vratenia` date DEFAULT NULL)'
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vypozicka');
    }
};
