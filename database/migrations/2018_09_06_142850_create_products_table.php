<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->decimal('price',10.0);
            $table->unsignedInteger('discount')->nullable();
            $table->string('thumbnail');
            $table->text('information')->nullable();
            $table->text('description');
            $table->enum('active',['T','F'])->default('T');
            $table->unsignedInteger('category');
            $table->unsignedInteger('brand');
            $table->unsignedInteger('supplier');
            $table->unsignedInteger('post_by');
            $table->foreign('category')->references('id')->on('categories');
            $table->foreign('brand')->references('id')->on('brands');
            $table->foreign('supplier')->references('id')->on('suppliers');
            $table->foreign('post_by')->references('id')->on('admins');
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
        Schema::dropIfExists('products');
    }
}
