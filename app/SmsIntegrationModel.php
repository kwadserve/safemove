<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SmsIntegrationModel extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tbl_sms_integration';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['sender_id','user_name','password','updated_by'];
}
