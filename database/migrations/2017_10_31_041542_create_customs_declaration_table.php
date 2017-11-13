<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomsDeclarationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customs_declaration', function (Blueprint $table) {
            $table->string('cd_id', 36)->primary();
            $table->date('cd_arrival_date');
            $table->string('cd_voyage_number', 5);
            $table->string('cd_full_name', 75);
            $table->string('cd_nationality', 2);
            $table->string('cd_passport_number', 10);
            $table->string('cd_occupation', 75);
            $table->string('cd_address_in', 150);
            $table->integer('cd_accompanying')->default(0);
            $table->integer('cd_accompanied_baggages')->default(0);
            $table->string('cd_email', 75);
            $table->text('cd_remarks')->nullable();
            $table->string('cd_employee_remarks', 75)->nullable();
            $table->integer('cd_update_by')->nullable();
            $table->date('cd_update_date')->nullable();
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
        Schema::dropIfExists('customs_declaration');
    }
}
