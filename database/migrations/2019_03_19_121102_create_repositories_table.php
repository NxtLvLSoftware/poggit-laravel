<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepositoriesTable extends Migration
{
    public function up()
    {
        Schema::create('repositories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('github_id');
            $table->string('name');
            $table->string('full_name');
            $table->boolean('private');
            $table->boolean('fork');
            $table->boolean('active');
            $table->unsignedBigInteger('webhook_id');
            $table->string('webhook_secret');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('repositories');
    }
}
