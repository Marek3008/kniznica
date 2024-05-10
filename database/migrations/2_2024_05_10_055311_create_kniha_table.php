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
        // Schema::create('kniha', function (Blueprint $table) {
        //     $table->smallInteger('isbn')->primary();
        //     $table->string('nazov', 50);
        //     $table->string('autor', 30);
        //     $table->year('rok_vydania');
        //     $table->string('zaner', 20);
        //     $table->boolean('stav');
        // });

        DB::statement('CREATE TABLE `kniha` (
            `isbn` int(13) NOT NULL PRIMARY KEY,
            `nazov` varchar(50) DEFAULT NULL,
            `autor` varchar(30) DEFAULT NULL,
            `rok_vydania` int(4) DEFAULT NULL,
            `zaner` varchar(20) DEFAULT NULL,
            `stav` tinyint(1) DEFAULT NULL
            )');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kniha');
    }
};
