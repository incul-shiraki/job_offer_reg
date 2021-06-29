<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecruitCompany extends Model
{
  protected $table = 'recruit_companies';
  protected $fillable= ['corporations_id',
                        'corporation_name',
                        'address',
                        'home_page',
                        'employee_number',
                        'establish_year',
                        'establish_month',
                        'company_profile',
                        'business_content',
                        'prefecture',
                        'industry1',
                        'industry2',
                        'corporation_logo'
  ];
}
