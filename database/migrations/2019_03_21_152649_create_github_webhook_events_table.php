<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGitHubWebhookEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('github_webhook_events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('event')->nullable();
            $table->text('payload')->nullable();
            $table->boolean('handled')->default(false);
            $table->boolean('failed')->default(false);
            $table->text('exception')->nullable();

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
        Schema::dropIfExists('github_webhook_events');
    }
}