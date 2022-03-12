<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->nullable();
            $table->string('token')->nullable();
            $table->foreignId('service_id')->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->foreignId('customer_status_id')->constrained()
                ->onUpdate('cascade')
                ->onUpdate('cascade');
            $table->string('identity_card');
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->dateTime('date')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('price')->nullable();
            $table->string('acceptance')->default('0');
            $table->string('invoice')->nullable();
            $table->dateTime('payment_due')->nullable();
            $table->string('payment_proof')->nullable();
            $table->string('payment')->default('0');
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
        Schema::dropIfExists('orders');
    }
}
