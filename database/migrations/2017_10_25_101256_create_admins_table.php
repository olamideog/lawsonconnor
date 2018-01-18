<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('admin') == false) {
            Schema::create('admin', function (Blueprint $table) {
                $table->increments('admin_id');                
                $table->string('admin_firstname')->nullable();
                $table->string('admin_lastname')->nullable();
                $table->string('admin_username')->unique();
                $table->string('admin_email')->unique();
                $table->text('admin_password')->nullable();
                $table->text('admin_remember_token')->nullable();
                $table->dateTime('admin_lastlogin')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin');
    }
}
