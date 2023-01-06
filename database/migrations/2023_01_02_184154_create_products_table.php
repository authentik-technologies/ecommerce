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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('brand_id');
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->string('product_name');
            $table->string('product_slug');
            $table->string('product_sku')->nullable();
            $table->string('product_qty')->nullable();
            $table->string('product_tags')->nullable();
            $table->string('product_color')->nullable();
            $table->string('product_size')->nullable();
            $table->string('product_price')->nullable();
            $table->string('product_cost')->nullable();
            $table->string('product_discount')->nullable();
            $table->string('product_coverage')->nullable();
            $table->string('product_weight')->nullable();
            $table->string('product_height')->nullable();
            $table->string('product_length')->nullable();
            $table->string('product_width')->nullable();
            $table->text('product_notes')->nullable();
            $table->text('product_short_description')->nullable();
            $table->text('product_long_description')->nullable();
            $table->string('product_thumbnail')->nullable();
            $table->enum('product_measurement',['each','pi²','box'])->default('each');
            $table->enum('product_status',['active','inactive','out of stock'])->default('active');
            $table->string('featured')->nullable();
            $table->string('special_offer')->nullable();
            $table->string('special_deal')->nullable();
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
};
