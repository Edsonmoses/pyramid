<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->longText('title')->nullable();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->longText('desc');
            $table->string('statno')->nullable();
            $table->string('statname')->nullable();
            $table->string('statsub')->nullable();
            $table->string('gallery')->nullable();
            $table->string('floorplan')->nullable();
            $table->string('fimage')->nullable();
            $table->string('download')->nullable();
            $table->string('downloadCount')->nullable()->default('0');
            $table->enum('disable', ['active', 'inactive'])->default('active');
            $table->enum('status', ['nowselling', 'completed'])->default('completed');
            $table->enum('off', ['show', 'hide'])->default('show');
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
        Schema::dropIfExists('projects');
    }
}
