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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('billing_cname',100)->nullable();
            $table->string('billing_address',60)->nullable();
            $table->string('billing_unit',10)->nullable();
            $table->string('billing_postal',10)->nullable();
            $table->string('billing_province',10)->nullable();
            $table->string('billing_city',30)->nullable();
            $table->string('shipping_name',100)->nullable();
            $table->string('shipping_cname',100)->nullable();
            $table->string('shipping_address',60)->nullable();
            $table->string('shipping_unit',10)->nullable();
            $table->string('shipping_postal',10)->nullable();
            $table->string('shipping_province',10)->nullable();
            $table->string('shipping_city',30)->nullable();
            $table->text('notes')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('currency',4);
            $table->decimal('tax',20,2)->nullable();
            $table->decimal('amount',20,2);
            $table->string('order_number',10);
            $table->string('invoice_no',10);
            $table->string('order_date');
            $table->string('order_month');
            $table->string('order_year');
            $table->string('confirmed_date')->nullable();
            $table->string('picked_date')->nullable();
            $table->string('shipped_date')->nullable();
            $table->string('processing_date')->nullable();
            $table->string('develivered_date')->nullable();
            $table->string('cancel_date')->nullable();
            $table->string('return_date')->nullable();
            $table->string('return_reason')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('orders');
    }
};
