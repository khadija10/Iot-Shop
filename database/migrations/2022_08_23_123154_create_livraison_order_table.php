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
        Schema::create('livraison_order', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('livraison_id');
            $table-> foreign('livraison_id')
                ->references('id')
                ->on('livraisons')
                ->onDelete('cascade');
            $table->unsignedBigInteger('order_id');
            $table-> foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onDelete('cascade');
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
        Schema::dropIfExists('livraison_order');
    }
};
