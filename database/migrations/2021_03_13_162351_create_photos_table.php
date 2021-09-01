<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('photos', function (Blueprint $table) {
            $table->id();
            $table->string('nom_file');
            $table->string('nom_thumb');
            $table->string('titre_photo');
            $table->text('description')->nullable();
            $table->bigInteger('votes')->default('0');
            $table->timestamps();

            $table->unsignedBigInteger('gallerie_id')->nullable()->default(null);
            $table->foreign('gallerie_id')
                ->references('id')
                ->on('galleries')
                ->onDelete('set null')
                ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photos');
    }
}
