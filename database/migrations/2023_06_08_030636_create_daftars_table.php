<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        Schema::create('daftars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('petanibajak_id');
            $table->string('nopetani', 12)->nullable();
            $table->integer('nokp');
            $table->string('nama', 255);
            $table->text('alamat');
            $table->unsignedInteger('poskod')->length(5);
            $table->unsignedInteger('daerah_id'); 
            $table->string('telrumah')->nullable();
            $table->string('telhp');
            $table->string('stesen');
            $table->integer('pohonid');
            $table->integer('tahunpohon');
            $table->integer('tarpohon');
            $table->string('musim');
            $table->string('bulanmusim2');
            $table->unsignedInteger('rd_daftar');
            $table->boolean('ch_musim');
            $table->boolean('ch_musim2');
            $table->date('tarikh');
            $table->timestamps();

            //  Foreign key constraint
             $table->foreign('daerah_id')->references('id')->on('daerah');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('daftars', function (Blueprint $table) {
            $table->dropForeign(['daerah_id']);
        }); Schema::dropIfExists('daftars');
    }
};
