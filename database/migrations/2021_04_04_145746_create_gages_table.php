<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gages', function (Blueprint $table) {
            $table->id();
            $table->string('lib');
            $table->integer('rang');
            $table->timestamps();

            $table->unsignedBigInteger('profil_id')->nullable()->default(null);
            $table->foreign('profil_id')
                ->references('id')
                ->on('profils')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gages');
    }
}
