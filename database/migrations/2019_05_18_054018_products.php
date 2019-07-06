<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pro_name', 100);
            $table->double('pro_price', 8,3);
            $table->integer('pro_amount');
            $table->string('pro_imgPath', 200);
            $table->text('pro_description')->nullable()->default("This product is one of the best selling products in the last period and has many advantages that make users accept the purchase it");;
            $table->string('pro_catagory', 100);
            $table->string('pro_returnPolicy', 100)->nullable();
            $table->string('pro_feature1', 100)->nullable();
            $table->string('pro_feature2', 100)->nullable();
            $table->string('pro_feature3', 100)->nullable();
            $table->string('pro_feature4', 100)->nullable();
            $table->string('pro_feature5', 100)->nullable();
            $table->string('pro_paymentMethods', 100);







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
        Schema::dropIfExists('products');
    }
}
