<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Sendings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sendings', function (Blueprint $table) {
            $table->char('id', 18);
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('courier_id');
            $table->unsignedInteger('order_via_id');
            $table->smallInteger('qty');
            $table->string('free_code')->nullable();
            $table->string('sender_name', 50);
            $table->string('receiver_name', 50);
            $table->string('phone_number', 30);
            $table->string('address');
            $table->string('destination')->nullable();
            $table->char('status', 1);
            $table->timestamps();
            $table->foreign('product_id')
                ->references('id')
                ->on('products');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->foreign('courier_id')
                ->references('id')
                ->on('couriers');
            $table->foreign('order_via_id')
                ->references('id')
                ->on('order_vias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sendings');
    }
}
