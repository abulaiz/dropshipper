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
        Schema::create('product_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
        });
        
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_category_id')->nullable();
            $table->string('name');
            $table->integer('qty');
            $table->integer('price');
            $table->string('type', 10);
            $table->timestamps();
            $table->foreign('product_category_id')
                ->references('id')
                ->on('product_categories');
        });

        Schema::create('product_mutations', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('product_id');
            $table->integer('qty');
            $table->boolean('is_added');
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
        Schema::dropIfExists('product_categories');
    }
}
