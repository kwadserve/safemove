<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeadStatusModel extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tbl_lead_status';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['lead_status', 'lead_type', 'orderno','created_by','updated_by'];
}
