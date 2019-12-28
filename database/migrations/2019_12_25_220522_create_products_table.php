<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->unsignedInteger('price');
            $table->text('description');
            $table->string('thumbnail')->default('product_thumbnail.png');
            $table->unsignedInteger('view_count')->default(0);
            $table->unsignedBigInteger('cate_id');
            $table->timestamps();

            $table->foreign('cate_id')
                  ->references('id')
                  ->on('categories')->onDelete('cascade');
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
    }
}
