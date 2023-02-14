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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('photo')->nullable();
            $table->string('phone')->nullable();
            $table->text('billing_address')->nullable();
            $table->text('billing_unit', 10)->nullable();
            $table->text('billing_cname', 100)->nullable();
            $table->text('billing_postal', 10)->nullable();
            $table->text('billing_city', 60)->nullable();
            $table->text('billing_province', 15)->nullable();
            $table->text('billing_country', 15)->nullable();
            $table->text('shipping_address')->nullable();
            $table->text('shipping_unit', 10)->nullable();
            $table->text('shipping_cname', 100)->nullable();
            $table->text('shipping_name', 100)->nullable();
            $table->text('shipping_postal', 10)->nullable();
            $table->text('shipping_city', 60)->nullable();
            $table->text('shipping_province', 15)->nullable();
            $table->text('shipping_country', 15)->nullable();
            $table->text('shipping_phone', 20)->nullable();
            $table->string('website_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('facebook_url')->nullable();
            $table->enum('role',['admin','vendor','user'])->default('user');
            $table->enum('status',['active','inactive'])->default('active');
            $table->string('last_seen')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
