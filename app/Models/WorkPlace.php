<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkPlace extends Model
{
    use HasFactory;
    protected $fillable= ['recruit_offer_infos_id',
                          'outsource_offer_infos_id',
                          'post_number',
                          'prefecture',
                          'address',
                          'nearest_station_line',
                          'nearest_station',
                          'nearest_station_distance',
                          'work_location_detail'
		];
}
