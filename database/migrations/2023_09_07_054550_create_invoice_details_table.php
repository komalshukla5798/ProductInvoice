<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Invoice_Detail', function (Blueprint $table) {
            $table->bigIncrements('InvoiceDetail_Id');
            $table->integer('Invoice_Id');
            $table->integer('Product_Id');
            $table->decimal('Rate', 8, 2); 
            $table->string('Unit');
            $table->integer('Qty');
            $table->decimal('Disc_Percentage', 5, 2);
            $table->decimal('NetAmount', 10, 2);
            $table->decimal('TotalAmount', 10, 2);
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
        Schema::dropIfExists('Invoice_Detail');
    }
}
