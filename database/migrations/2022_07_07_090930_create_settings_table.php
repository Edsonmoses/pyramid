<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->default('logo-light.png');
            $table->string('slug')->default('null');
            $table->string('favicon')->default('favicon.jpg');
            $table->string('tophone')->default('+254 700 779 944');
            $table->string('email')->default('info@pyramidbuilders.co.ke');
            $table->string('flogo')->default('logo-light.png');
            $table->string('fdesc')->default('Whether you are entertaining guests or just want to spend a day in the comfortable luxury of your home, each space in our homes is designed to create lasting impressions that will be appreciated for generations.');
            $table->string('location')->default('1st Floor, Woodridge Center, <br/>Wood Avenue, KIlimani');
            $table->string('box')->default('P.O. Box 17575, Enterprise - Rd <br/> 00500 Nairobi, Kenya<');
            $table->string('phone')->default('+254 722 981 125 <br/>+254 720 150 988');
            $table->string('creation')->default('logo_W.png');
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
        Schema::dropIfExists('settings');
    }
}
