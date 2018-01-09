<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
  public function up()
  {
    Schema::create('users', function (Blueprint $table) {
      $table->increments("id");
      $table->string("us_mail");
      $table->string("us_name");
      $table->string("us_password");
      $table->decimal("us_auth");
    });
  }

  public function down()
  {
    Schema::dropIfExists('users');
  }
}