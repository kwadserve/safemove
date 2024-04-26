<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyDetailsModel extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tbl_company_Details';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'legel_name', 'contact_person', 'contact_email','contact','alt_contact',
        'add_line1','add_line2','city','pincode','state','country','website','gst_no',
        'isdelete','created_by','updated_by'];
}
