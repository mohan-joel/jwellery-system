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
        Schema::create('sale_orders', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_num');
            $table->date('date');
            $table->string('customer_email');
            $table->unsignedBigInteger('jwelleryType_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('ordered_qty');
            $table->integer('discount')->nullable();
            $table->float('total_sp',8,2);
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
        Schema::dropIfExists('sale_orders');
    }
};
