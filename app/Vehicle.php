<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable=[
    'company_id',
    'model_id',
    'title',
    'category_id',
    'model_year',
    'vehicle_number',
    'purchased_from',
    'purchased_address1',
    'purchased_address2',
    'purchased_phone1',
    'purchased_phone2',
    'purchased_phone3',
    'purchased_type',
    'purchased_date',
    'kilometer_reading',
    'purchased_amount',
    'insurance_amount',
    'total_amount',
    'engine_work_expense',
    'clutch_work_expense',
    'piston_work_expense',
    'chain_sprocket_work_expense',
    'other_work_expense',
    'other_work_expense_note',
    'mechanical_expense_remarks',
    'total_expense',
    'insurance_due_date',
    'selling_price',
    'sold_out_price',
    'sold_out_date',
    'vehicle_status_id',
    'advanced_amount',
    'refund_amount',
    'hp_noting',
    'damage_info',
    'rc_photo',
    'remarks',
    'created_by',
    'updated_by'];
    protected $table="vehicles";
}
