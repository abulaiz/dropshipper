<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('qty');
            $table->integer('booked')->default('0');
            $table->integer('price');
            $table->smallInteger('weight'); // per gram
            $table->string('type', 10);
            $table->timestamps();
        });

        Schema::create('product_mutations', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('product_id');
            $table->integer('qty');
            $table->char('status', 1); // 1 = sold by member, 2 = added by admin
            $table->string('description');
            $table->timestamp('created_at');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->foreign('product_id')
                ->references('id')
                ->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('product_mutations');
    }
}
