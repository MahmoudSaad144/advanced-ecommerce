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
            $table->string('username', 255)->nullable();
            $table->string('photo', 255)->nullable()->default('back/dist/img/author/default-img.png');
            $table->text('biography',255)->nullable();
            $table->integer('type')->nullable()->default(2);
            $table->integer('blocked')->nullable()->default(0);
            $table->string('provider', 255)->nullable();
            $table->string('provider_id', 255)->nullable();
            $table->text('provider_token', 500)->nullable();
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
