<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id()->comment('報價編號');
            $table->unsignedInteger('contract_id')->unique()->comment('委刊編號')->nullable();
            $table->string('theme')->comment('主題');
            $table->integer('status');
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('author_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->json('promise')->comment('委刊內容');
            $table->integer('pay_type');
            $table->unsignedDecimal('service_fee', 5, 2)->comment('服務費(%)')->nullable();
            $table->unsignedDecimal('markup', 5, 2)->comment('markup(%)')->nullable();
            $table->unsignedDecimal('total_price')->comment('委刊總金額(未稅)');
            $table->string('signed_url')->nullable();
            $table->dateTime('signed_created_time')->nullable();
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
        Schema::dropIfExists('contracts');
    }
}
