<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomsDeclarationGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customs_declaration_goods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cd_id', 36);
            $table->string('goods_description', 175);
            $table->integer('goods_quantity')->default(0);
            $table->integer('goods_value')->default(0);
            $table->string('goods_remarks')->nullable();
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
        Schema::dropIfExists('customs_declaration_goods');
    }
}
