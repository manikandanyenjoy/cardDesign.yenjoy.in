<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesignCard extends Model
{
    use HasFactory;

    protected $fillable = [
                'date',
                'customer_id',
                'lable',
                'designer_id',
                'design_number',
                'salesrep_id',
                'weaver_id',
                'warps_id',
                'picks',
                'total_picks',
                'loom_id',
                'total_repet',
                'wastage',
                'finishing_id',
                'cost_in_roll',
                'total_cost',
                'catagory',
                'length',
                'sq_inch',
                'customer_grade',
                'width',
                'add_on_cast',
                'needle'
    ];

                
}
