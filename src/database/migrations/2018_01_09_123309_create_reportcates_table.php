<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportcatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reportcates', function (Blueprint $table) {
            $table->increments('id');
            $table->text('rc_name');
            $table->text('rc_note');
            $table->integer('rc_list_flg');
            $table->integer('rc_order');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reportcates');
    }
}
