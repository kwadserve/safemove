<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShiftingAddressDetails extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tbl_enquiry_customer_details';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
//    protected $fillable = ['enq_id','src_prop_type','src_floor_no','src_packing_req','src_loading_req','src_elavator',
//    'dest_prop_type','dest_floor_no','dest_unpacking_req','dest_unloading_req','dest_elavator',
//    'src_add_line1','src_add_line2','src_city','src_pincode','src_state','src_country',
//    'dest_add_line1','dest_add_line2','dest_city','dest_pincode','dest_state','dest_country'];
    protected $fillable = ['enq_id','src_prop_type','src_floor_no','src_packing_req','src_loading_req','src_elavator',
        'dest_prop_type','dest_floor_no','dest_unpacking_req','dest_unloading_req','dest_elavator',
        'src_add_line1','dest_add_line1'];
}
