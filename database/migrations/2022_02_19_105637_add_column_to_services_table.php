<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->after('laboratory_id', function($table) {
                $table->foreignId('unit_id')->constrained()
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
                $table->string('name')->unique();
                $table->text('note')->nullable();
                $table->integer('quantity')->nullable();
                $table->integer('min')->nullable();
                $table->string('slug')->unique();
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropForeign(['unit_id']);
            $table->dropColumn(['unit_id', 'name', 'note', 'quantity', 'min', 'slug']);
        });
    }
}
