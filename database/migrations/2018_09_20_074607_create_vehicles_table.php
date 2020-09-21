<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned();
           
            $table->integer('model_id')->nullable();
            $table->integer('category_id');
            $table->string('title');
            $table->string('model_year')->nullable(); 
            $table->string('vehicle_number')->nullable(); 
            $table->string('purchased_from')->nullable();        
            $table->string('purchased_address1')->nullable();
            $table->string('purchased_address2')->nullable(); 
            $table->string('purchased_phone1')->nullable(); 
            $table->string('purchased_phone2')->nullable();
            $table->string('purchased_phone3')->nullable(); 
            $table->integer('purchased_type')->nullable();
            $table->string('purchased_date')->nullable();
            $table->string('kilometer_reading')->default('0')->nullable();
            $table->string('purchased_amount')->default('0')->nullable();
            $table->string('insurance_amount')->default('0')->nullable();
            $table->string('engine_work_expense')->default('0')->nullable();
            $table->string('clutch_work_expense')->default('0')->nullable();
            $table->string('piston_work_expense')->default('0')->nullable();
            $table->string('chain_sprocket_work_expense')->default('0')->nullable();
            $table->string('other_work_expense')->default('0')->nullable();
            $table->string('other_work_expense_note')->nullable();
            $table->string('mechanical_expense_remarks')->nullable();
            $table->string('total_expense')->default('0')->nullable();
            $table->string('insurance_due_date')->nullable()->nullable();
            $table->string('selling_price')->default('0')->nullable();
            $table->string('sold_out_price')->default('0')->nullable();
            $table->string('sold_out_date')->nullable();
            $table->integer('vehicle_status_id')->nullable();
            $table->string('total_amount')->nullable();
            $table->string('advanced_amount')->default('0')->nullable();
            $table->string('refund_amount')->default('0')->nullable();
            $table->string('hp_noting')->nullable();
            $table->string('damage_info')->nullable();
            $table->string('rc_photo')->nullable();
            $table->string('remarks')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
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
        Schema::dropIfExists('vehicles');
    }
}
