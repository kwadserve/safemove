<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SMSTemplateModel extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tbl_sms_template';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['sms_for', 'sms_body','created_by','updated_by','isdelete'];
}
