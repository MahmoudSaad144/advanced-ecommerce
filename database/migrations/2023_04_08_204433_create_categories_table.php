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
        Schema::create('categories', function (Blueprint $table) {
            $table->id('categoryid');
            $table->string('category_name')->unique();
            $table->text('description')->nullable()->default('text');
            $table->text('photo')->nullable()->default('defualt.png');
            $table->string('parent')->default('uncategories'); // parent category
            $table->unsignedBigInteger('userid');
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
        Schema::dropIfExists('categories');
    }
};
