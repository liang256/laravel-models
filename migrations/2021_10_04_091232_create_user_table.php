<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
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
            $table->string('email');
            $table->unsignedInteger('create_by')->default(0);
            $table->unsignedInteger('update_by')->default(0);
            $table->unsignedSmallInteger('group_id')->default(0);
            $table->unsignedSmallInteger('role_id')->default(0);
            $table->unsignedInteger('parent_id')->nullable();
            $table->unsignedInteger('status');
            $table->string('language',150);
            $table->string('token')->default('');
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
}
