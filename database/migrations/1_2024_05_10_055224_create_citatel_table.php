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
        // Schema::create('citatel', function (Blueprint $table) {
        //     $table->smallIncrements('id');
        //     $table->string('meno', 15);
        //     $table->string('priezvisko', 15);
        //     $table->string('telefonne_cislo', 18);
        //     $table->date('datum_narodenia');
        //     $table->string('adresa', 60);
        // });

        DB::statement('CREATE TABLE `citatel` (
            `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
            `meno` varchar(15) DEFAULT NULL,
            `priezvisko` varchar(15) DEFAULT NULL,
            `telefonne_cislo` varchar(18) DEFAULT NULL,
            `datum_narodenia` date DEFAULT NULL,
            `adresa` varchar(60) DEFAULT NULL)'
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citatel');
    }
};
