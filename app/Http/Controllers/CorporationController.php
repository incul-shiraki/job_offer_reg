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



class CorporationController extends Controller
{
//求人情報登録画面の描画
  //コピーから作成用に求人情報テーブルからログイン企業ごとの求人タイトルと求人情報IDを取得
  public function new()
  {
    $rec_info_re = 0;
    $status = 1;
    list($corp, $corp_rec, $first, $first_category, $second, $second_category, $prefectures, $charmpoints, $rec_info, $recruit_company) = $this->dataCollection();
    return view('job_offer_registration', 
      compact('rec_info_re',
              'status',
              'corp',
              'corp_rec',
              'first',
              'first_category',
              'second',
              'second_category',
              'prefectures',
              'charmpoints',
              'rec_info',
              'recruit_company'
      ));
  }

  public function edit($id)
  {
    $rec_info_re = AllRecInfo::findOrFail($id);
    $status = 2;
    list($corp, $corp_rec, $first, $first_category, $second, $second_category, $prefectures, $charmpoints, $rec_info, $recruit_company) = $this->dataCollection();
    return view('job_offer_registration', 
      compact('rec_info_re',
              'status',
              'corp',
              'corp_rec',
              'first',
              'first_category',
              'second',
              'second_category',
              'prefectures',
              'charmpoints',
              'rec_info',
              'recruit_company'
      ));
  }
  
  //debug用
  public function new_confirm(Request $req)
  {
    $data = $req->all();
    $first = \DB::table('first_industries')->get();
    $second = \DB::table('second_industries')->get();
    // dump($data);
    
    return view('/conf_posts')->with($data);
  }

  public function create(Request $request)
  {

    if($request->get('back')){
      return redirect('job_offer_registration')->withInput();
    }else{
    $count = \App\Models\RecruitCompany::where('corporation_name', $request->company_name)->count();
    //画像データの処理
    //$comp_logo = $request->company_logo;
    // if($comp_logo->isValid()) {
    //   $filePath = $comp_logo->store('public');
    //   $corporation->corporation_logo = str_replace('public/', '',$filePath);
    // }
    if ($count == 0) {
    // 募集企業登録で登録していない企業を登録
			$recruitCompanyInsertData = $this->setupDataRecruitCompany($request);
			$recruitCompanyDb = RecruitCompany::create($recruitCompanyInsertData);
    }

  //求人情報
    $recruitOfferInfoInsertData = $this->setupDataRecruitOfferInfo($request);
    $recruitOfferInfoDb = RecruitOfferInfo::create($recruitOfferInfoInsertData);

  //勤務地詳細
    $workPlaceInsertData = $this->setupDataWorkPlace($request,$recruitOfferInfoDb);
    $workPlaceDb = WorkPlace::insert($workPlaceInsertData);

    // 一覧にリダイレクト
     return redirect('job_offer_registration');

    }
  }

  public function update(Request $request, $id)
  {
    if($request->get('back')){
      return redirect('job_offer_registration')->withInput();
    }else{
  //求人情報更新
    $recruitOfferInfoInsertData = $this->setupDataRecruitOfferInfo($request);
    $recruitOfferInfoDb = RecruitOfferInfo::where('id', $id)->update($recruitOfferInfoInsertData);

    // 一覧にリダイレクト
     return redirect('job_offer_registration');
    }
  }

  public function edit_corp(Request $request)
  {
    // DBオブジェクト生成
    $recruitCompanyInsertData = $this->setupDataRecruitCompany($request);

    // 保存して一覧にリダイレクト
    $recruitCompanyDb = RecruitCompany::where('id', $request->company_id)->update($recruitCompanyInsertData);
    return redirect('job_offer_registration');
  }

  public function create_corp(Request $request)
  {
    // DBオブジェクト生成
    $recruitCompanyInsertData = $this->setupDataRecruitCompany($request);

    // 保存して一覧にリダイレクト
    $recruitCompanyDb = RecruitCompany::create($recruitCompanyInsertData);
    return redirect('job_offer_registration');
  }

	public function get_content(Request $request)
	{
    list($corp, $corp_rec, $first, $first_category, $second, $second_category, $prefectures, $charmpoints, $rec_info, $recruit_company) = $this->dataCollection();
    $info_re = AllRecInfo::findOrFail($request->movecopy);
    $rec_info_re = AllRecInfo::where('id', $request->movecopy)->first();
    $status = 1;

    return view('job_offer_registration', 
      compact(
        'rec_info',
        'rec_info_re',
        'first',
        'second',
        'first_category',
        'second_category',
        'corp',
        'charmpoints',
        'prefectures',
        'info_re',
        'status',
        'recruit_company'
      ));
  }

  public function show_offer_detail($id){
      $rec_info_re = AllRecInfo::findOrFail($id);

    return view('/offer_comp/management_screen/offer_comp_management_view/job_offer_detail',
      compact('id',
              'rec_info_re'
      ));
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
      $charmpoints = config('constants.charmpoints');
      $rec_info = RecruitOfferInfo::select('id','job_title')->get();
      $recruit_company = RecruitCompany::get();
      return[$corp, $corp_rec, $first, $first_category, $second, $second_category, $prefectures, $charmpoints, $rec_info, $recruit_company];
    }

    private function setupDataRecruitCompany(Request $request)
    {
      $corporation = Corporation::where('id', 1)->first();
      $insertArray = ['corporations_id' => 1,
                    'corporation_name' => $request->company_name,
                    'prefecture' => $request->comp_add01,
                    'address' => $request->comp_add02,
                    'home_page' => $request->company_hp,
                    'industry1' => $request->job1c,
                    'industry2' => $request->job2c,
                    'employee_number' => $request->employee_number,
                    'establish_year' => substr($request->foundation_date, 0,4),
                    'establish_month' => substr($request->foundation_date,-2),
                    'company_profile' => $request->company_overview,
                    'business_content' => $request->business_guidance,
                    'corporation_logo' => $request->company_logo->store('public/' . $corporation->id)
      ];
      return   $insertArray;
    }

    private function setupDataRecruitOfferInfo(Request $request)
    {
      $recruit_company_no = \App\Models\RecruitCompany::where('corporation_name', $request->company_name)->first();
      $corporation = Corporation::where('id', 1)->first();
      $insertArray = ['corporations_id' => 1,
                      'recruit_company_id' => $recruit_company_no->id,
                      'recruit_ocupation' => $request->recruiting_job_category_name,
                      'open_status' => 1,
                      'job_title' => $request->job_offer_title,
                      'job_feature' => implode(",", $request->feature_offer_point),
                      'image_main' => $request->main_image->store('storage/' . $corporation->id),
                      //イメージの処理（暫定）                                                                                  
                      // $image_seq = $request->sub_image1;
                      // if($image_seq->isValid()) {                                                                            
                      // }else{                                                                                                 
                      //   $recruit_oi->image_sub_1 = $request->sub_image1->store('storage/' . $recruit_oi->corporations_id);
                      //   $recruit_oi->image_sub_2 = $request->sub_image2->store('storage/' . $recruit_oi->corporations_id);
                      //   $recruit_oi->image_sub_3 = $request->sub_image3->store('storage/' . $recruit_oi->corporations_id);
                      //   $recruit_oi->image_sub_4 = $request->sub_image4->store('storage/' . $recruit_oi->corporations_id);
                      //   $recruit_oi->image_sub_5 = $request->sub_image5->store('storage/' . $recruit_oi->corporations_id);
                      // }                                                                                                     

                      'marketing_use' => $request->customer_acquisition_use_availability,
                      'job_requirement' => $request->required_requirement,
                      'final_education' => $request->last_educational_background,
                      'applicable_age_from' => $request->can_apply_age_more,
                      'applicable_age_to' => $request->can_apply_age_under,
                      'company_number' => $request->working_experience_company_number,
                      'sex' => $request->sex ,
                      'inexperienced' => $request->unexperienced_availability,
                      'foregin_nationality' => $request->foreign_nationality_availability,
                      'english_level' => $request->english_conversation_level,
                      'chinese_level' => $request->chinese_conversation_level,
                      'recruit_period' => $request->calender_area,
                      'occupation_category_1' => $request->job_category1,
                      'occupation_category_2' => $request->job_category2,
                      'recruiting_plan_count' => $request->recruiting_plan_count,
                      'PV_count' => 1,
                      'job_description' => $request->job_content,
                      'job_attraction' => $request->work_appeal,
                      'job_experience' => $request->active_experience,
                      'management_supervisor' => $request->supervisor_job_offer,
                      'department' => $request->division_name,
                      'department_detail' => $request->division_detail,
                      'employment' => $request->employment_status,
                      'working_time_type' => $request->working_hours_type,
                      'working_time' => $request->working_hours,
                      'working_hours_system' => $request->working_hours_system_fixed_overtime_work_fare,
                      'deemed_working_hours_system' => $request->deemed_working_hours_system_type,
                      'deemed_working_hours' => $request->deemed_working_hours_per_one_day,
                      'overtime_hours' => $request->overtime_hours_detail,
                      'short_working_hours_system' => $request->shorter_working_hours_working,
                      'short_working_hours_system_detail' => $request->shorter_working_hours_working_detail,
                      'selection_flow' => implode(",", $request->selection_flow),
                      'selection_detail' => $request->selection_detail,
                      'telework' => $request->home_working,
                      'telework_info' => $request->home_working_detail,
                      'salary_type' => $request->payroll_type,
                      'yearly_pay_amount_from' => $request->yearly_pay_amount_more,
                      'yearly_pay_amount_to' => $request->yearly_pay_amount_under,
                      'payment_method' => $request->year_pay_method,
                      'monthly_salaly_from' => $request->monthly_pay_more,
                      'monthly_salaly_to' => $request->monthly_pay_under,
                      'montyly_pay_assumption_annual_income_from' => $request->assumption_annual_income_more,
                      'montyly_pay_assumption_annual_income_to' => $request->assumption_annual_income_under,
                      'daily_salary_from' => $request->dayly_wage_more,
                      'daily_salary_to' => $request->dayly_wage_under,
                      'hourly_wage_from' => $request->hourly_wage_more,
                      'hourly_wage_to' => $request->hourly_wage_under,
                      'basic_salary' => $request->base_salary_amount,
                      'fixed_overtime_fee' => $request->fixed_overtime_work_fee_amount,
                      'fixed_overtime_hours' => $request->fixed_overtime_work_time,
                      'payment_for_fixed_overtime' => $request->fixed_overtime_hours_excess_part_pay,
                      'salary_treatment_detail' => $request->payroll_treatment_detail,
                      'trial_period' => $request->testing_period,
                      'trial_period_deatail' => $request->testing_period_detail,
                      'annual_holiday' => $request->annual_holiday,
                      'holiday_vacation' => $request->holiday_leave,
                      'welfare' => $request->welfare_benefits,
                      'counterplan_secound_hand_smok' => $request->passive_smoking_control,
                      'counterplan_secound_hand_smok_detail' => $request->passive_smoking_control_ditail,

											'calculation_method_performance_fee' => $request->successful_reward_calculation_method,
                      'Theoretical_annual' => $request->ratio,
                      'Theoretical_annual_income' => $request->terms_at_rate,
                      'fixed_reward' => $request->fixed_reward_amount,
                      'refund_policy' => $request->refund_provision,
											'warning_text' => $request->memo
			];
      return   $insertArray;
    }
    
    private function setupDataWorkPlace(Request $request, $recruitOfferInfoDb)
    {
      $recruitOfferInfoInsertData = $this->setupDataRecruitOfferInfo($request);
      for ($i = 0; $i < count($request->loc01); $i++) { 
        $tempArray = [
          'recruit_offer_infos_id' => $recruitOfferInfoDb->id,
          'outsource_offer_infos_id' => $recruitOfferInfoDb->id,
      //  'outsource_offer_infos_id' => $outsource_oi->id,
          'post_number' => $request->loc01[$i],
          'prefecture' => $request->loc02[$i],
          'address' => $request->loc03[$i],
          'nearest_station_line' => $request->loc04[$i],
          'nearest_station' => $request->loc05[$i],
          'nearest_station_distance' => $request->loc06[$i],
          'work_location_detail' => $request->loc07[$i]
        ];
        $insertArray[] = $tempArray;
      }
        return   $insertArray;
    }
    
}
