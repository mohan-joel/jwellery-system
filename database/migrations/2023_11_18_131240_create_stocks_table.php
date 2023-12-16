<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('supplier_email')->nullable();
            $table->unsignedBigInteger('jwelleryType_id');
            $table->unsignedBigInteger('product_id');
            $table->string('serial_num');
            $table->string('product_code')->nullable();
            $table->text('barcode')->nullable();
            $table->text('net_wt');
            $table->text('gross_wt');
            $table->text('stone_wt');
            $table->text('price')->nullable();
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
        Schema::dropIfExists('stocks');
    }
};
