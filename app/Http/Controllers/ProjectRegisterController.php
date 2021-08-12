<?php

namespace App\Http\Controllers;
use App\Models\Corp_Rec;
use App\Models\AllRecInfo;
use App\Models\VCorp;
use App\Models\WorkPlace;
use App\Models\Corporation;
use App\Models\RecruitOfferInfo;
use App\Models\FirstIndustry;
use App\Models\SecondIndustry;
use App\Models\FirstJobCategory;
use App\Models\SecondJobCategory;
use App\Models\RecruitCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use \InterventionImage;  


class ProjectRegisterController extends Controller
{
  public function form()
  {
    $rec_info_re = 0;
    $work_place = 0;
    $status = 1;
    $copy = 0;
    list($corp, $corp_rec, $first, $first_category, $second, $second_category, $prefectures, $selection_flows, $responsible_process, $rec_info, $recruit_company, $skill_name, $first_skill_category, $second_skill_category, $experience_year) = $this->dataCollection();
    return view('/offer_comp/business_commission/project_registration', 
      compact('rec_info_re',
              'work_place',
              'status',
              'copy',
              'corp',
              'corp_rec',
              'first',
              'first_category',
              'second',
              'second_category',
              'prefectures',
              'selection_flows',
              'skill_name',
              'first_skill_category',
              'second_skill_category', 
              'experience_year',
              'responsible_process',
              'rec_info',
              'recruit_company'
      )
    );
  }

  public function create(Request $request)
  {
    dd($request);
  }

     private function dataCollection()
    {
      $corp = VCorp::get();
      $corp_rec = Corp_Rec::select('prefecture')->get();
      $first = FirstIndustry::select('id','name')->get();
      $first_category = FirstJobCategory::select('id','name')->get();
      $second = SecondIndustry::select('id','first_industry_id','name')->get();
      $second_category = SecondJobCategory::select('id','first_job_category_id','name')->get();
      $prefectures = config('constants.prefectures');
      $selection_flows = config('constants.selection_flows_project');
      $skill_name = config('constants.skill_name');
      $first_skill_category = config('constants.first_skill_category');
      $second_skill_category = config('constants.second_skill_category');
      $skill_name = config('constants.skill_name');
      $experience_year = config('constants.experience_year');
      $responsible_process = config('constants.responsible_process');
      $rec_info = RecruitOfferInfo::select('id','job_title')->get();
      $recruit_company = RecruitCompany::get();
      return[$corp, $corp_rec, $first, $first_category, $second, $second_category, $prefectures,  $selection_flows, $responsible_process, $rec_info, $recruit_company, $skill_name, $first_skill_category, $second_skill_category, $experience_year];
    }

}
