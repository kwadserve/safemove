<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfficeExpensesModel extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tbl_office_expenses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['expenes_by', 'payment_mode', 'amount', 'narration','bank_name','category','isdelete','created_by','updated_by','offexp_date'
        ,'vehicle_name'];
}
