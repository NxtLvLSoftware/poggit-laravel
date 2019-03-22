<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepositoriesTable extends Migration
{
    public function up()
    {
        Schema::create('repositories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('owner_id')->index();
            $table->string('owner_type'); //user or org
            $table->unsignedBigInteger('github_id')->index();
            $table->string('name');
            $table->string('full_name');
            $table->boolean('private');
            $table->boolean('fork');
            $table->boolean('revoked')->default(false);
            $table->boolean('active')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('repositories');
    }
}
