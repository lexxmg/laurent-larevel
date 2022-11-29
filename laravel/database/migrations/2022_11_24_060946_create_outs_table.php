<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('icon_id')->default(1)->constrained();
            $table->foreignId('gpio_id')->constrained();
            $table->foreignId('mode_id')->default(1)->constrained();
            $table->integer('virt_on')->nullable();
            $table->integer('virt_off')->nullable();
            $table->string('virt_type')->nullable();
            $table->boolean('revers')->default(false);
            $table->foreignId('laurent_id')->constrained()->cascadeOnDelete();
            $table->boolean('confirm')->default(false);
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
        Schema::dropIfExists('outs');
    }
}
