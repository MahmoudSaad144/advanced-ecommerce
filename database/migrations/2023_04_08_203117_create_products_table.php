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
            $table->id('id');
            $table->string('product_name');
            $table->text('product_desc');
            $table->integer('product_price');
            $table->string('product_sku');
            $table->text('product_images');
            $table->decimal('product_discount')->default(0)->nullable();
            $table->unsignedBigInteger("categoryid")->default(1);
            $table->unsignedBigInteger("vendorid");
            $table->unsignedBigInteger("inventoryid")->default(1);
            $table->unsignedBigInteger("discount_id")->default(0);
            $table->unsignedBigInteger("views")->default(0);
            $table->string('active')->default(0);
            $table->timestamps();
            $table->softDeletes();
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
