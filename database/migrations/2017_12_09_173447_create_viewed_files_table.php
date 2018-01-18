<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewedFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('viewed_files', function (Blueprint $table) {
            $table->increments('view_id');
            $table->integer('user_id');
            $table->integer('file_id');
            $table->char('status')->default(0);
            $table->timestamps();
            $table->timestamp('viewed_on');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('viewed_files');
    }
}
