<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnquiryArticalsList extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tbl_enquiry_articals_list';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['enq_id','artical_count','artical_id','vehicle_type','vehicle_segment','vehicle_name','goods_value'];
}
