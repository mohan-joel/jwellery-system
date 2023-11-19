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
            $table->float('weight',8,2);
            $table->integer('quantity');
            $table->float('tax',5,2)->nullable();
            $table->float('discount',5,2)->nullable();
            $table->string('product_code')->nullable();
            $table->text('barcode')->nullable();
            $table->float('total_cp',8,2);
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
