<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained('users') 
                ->onDelete('cascade');
            $table->string('payment_method');
            $table->longtext('transaction_id')->nullable();
            $table->string('currency_code');
            $table->float('amount');
            $table->string('payment_status'); 
            $table->float('tax_amount')->nullable();
            $table->string('package')->nullable(); 
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
        Schema::dropIfExists('receipts');
    }
}
