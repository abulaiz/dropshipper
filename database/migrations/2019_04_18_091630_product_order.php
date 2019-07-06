<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_orders', function (Blueprint $table) {
            $table->char('id', 18)->primary();
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('user_id');
            $table->integer('qty');
            $table->char('status', 1); // 1 = menunggu pembayaran, 2 = berhasil, 3 = ditolak admin
            $table->timestamps();

            $table->foreign('product_id')
                ->references('id')
                ->on('products');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_orders');
    }
}
