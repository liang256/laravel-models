<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApproveRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approve_requests', function (Blueprint $table) {
            $table->id();
            $table->integer('topic_id')->comment('主題代號');
            $table->integer('status');
            $table->unsignedBigInteger('applier_id')->comment('申請人');
            $table->unsignedBigInteger('approver_id')->comment('審核人');
            $table->morphs('subject');
            $table->json('subject_snapshot')->comment('審核內容快照');
            $table->text('applier_msg')->nullable();
            $table->text('approver_msg')->nullable();
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
        Schema::dropIfExists('approve_requests');
    }
}
