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
            $table->char('id', 18)->primary();
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('courier_id');
            $table->unsignedInteger('order_via_id');
            $table->smallInteger('qty');
            $table->char('status', 1); // 1 = Menunggu Pembayaran, 2 = Pembayaran terkonfirmasi, 3 = Barang dikirim, 4 = ditolak admin

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

        Schema::create('sending_details', function(Blueprint $table) {
            $table->char('sending_id', 18);
            $table->string('free_code')->nullable();
            $table->string('sender_name', 50);
            $table->string('receiver_name', 50);
            $table->string('phone_number', 30);
            $table->string('address');
            $table->string('province', 80)->nullable();
            $table->string('city', 80)->nullable();
            $table->string('subdistrict', 80)->nullable();
            $table->string('country', 80)->nullable();
            $table->string('price', 80);
            $table->string('courier_service', 80);

            $table->foreign('sending_id')
                ->references('id')->on('sendings')
                ->onDelete('cascade')->onUpdate('cascade');            
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
