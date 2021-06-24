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
	public function new(){
		$prefectures = config('constants.prefectures');
		$charmpoints = config('constants.charmpoints');
		$rec_info_re = 0;
		$test = AllRecInfo::get(); 
		$rec_info = RecruitOfferInfo::select('id','job_title')->get();
		$recruit_company = RecruitCompany::get();
		// $corp = Corporation::get();
		$first = FirstIndustry::select('id','name')->get();
		$second = SecondIndustry::select('id','first_industry_id','name')->get();
		$first_category = FirstJobCategory::select('id','name')->get();
		$second_category = SecondJobCategory::select('id','first_job_category_id','name')->get();
		$corp_rec = Corp_Rec::select('prefecture')->get();
		$corp = VCorp::get();
		$status = 1;
		// dump($recruit_company);
		// dump($corp);
		dump($test);
		return view('job_offer_registration', 
			compact('rec_info',
							'rec_info_re',
							'corp',
							'prefectures',
							'charmpoints',
							'first',
							'second',
							'first_category',
							'second_category',
							'corp_rec',
							'status',
							'recruit_company'
			));
	}

    public function edit($id)
    {
			// $rec_info_re = \App\Models\RecruitOfferInfo::findOrFail($id);
		  $rec_info_re = AllRecInfo::findOrFail($id); 
			$prefectures = config('constants.prefectures');
			$charmpoints = config('constants.charmpoints');
			$rec_info = RecruitOfferInfo::select('id','job_title')->get();
			$recruit_company = RecruitCompany::get();
			// $corp = Corporation::get();
			$first = FirstIndustry::select('id','name')->get();
			$second = SecondIndustry::select('id','first_industry_id','name')->get();
			$first_category = FirstJobCategory::select('id','name')->get();
			$second_category = SecondJobCategory::select('id','first_job_category_id','name')->get();
			$corp_rec = Corp_Rec::select('prefecture')->get();
			$corp = VCorp::get();
			$status = 2;
			// dump($recruit_company);
			// dump($corp);
			dump($rec_info_re);
			return view('job_offer_registration', 
				compact('rec_info',
								'rec_info_re',
								'corp',
								'prefectures',
								'charmpoints',
								'first',
								'second',
								'first_category',
								'second_category',
								'corp_rec',
								'status',
								'recruit_company'
				));
    }
	
	//フォームの入力確認画面
	public function new_confirm(Request $req)
	{
		$data = $req->all();
		$first = \DB::table('first_industries')->get();
		$second = \DB::table('second_industries')->get();
		dump($data);
		
		return view('/conf_posts')->with($data);
	}

  public function create(Request $request)
  {

		if($request->get('back')){
			return redirect('job_offer_registration')->withInput();
		}else{
		// DBオブジェクト生成
		$recruit_company = new \App\Models\RecruitCompany;
		$count = \App\Models\RecruitCompany::where('corporation_name', $request->company_name)->count();
		$recruit_oi = new \App\Models\RecruitOfferInfo;
		$work_place = new \App\Models\WorkPlace;
		$recruit_company_no = \App\Models\RecruitCompany::where('corporation_name', $request->company_name)->first();
		//画像データの処理
		//$comp_logo = $request->company_logo; 
		// if($comp_logo->isValid()) {
		// 	$filePath = $comp_logo->store('public');
		// 	$corporation->corporation_logo = str_replace('public/', '',$filePath); 
		//
		// }
		if ($count == 0) {
		// 募集企業登録で登録していない企業を登録
		$recruit_company->corporations_id = 1;
		$recruit_company->corporation_name = $request->company_name;
		$recruit_company->address = $request->comp_add02;
		$recruit_company->home_page = $request->company_hp;
		$recruit_company->employee_number = $request->employee_number;
		$recruit_company->establish_year = substr($request->foundation_date, 0,4);
		$recruit_company->establish_month = substr($request->foundation_date,-2);
		$recruit_company->company_profile = $request->company_overview;
		$recruit_company->business_content = $request->business_guidance;
		$recruit_company->prefecture = $request->comp_add01;
		$recruit_company->industry1 = $request->job1c;
		$recruit_company->industry2 = $request->job2c;
		$recruit_company->corporation_logo = $request->company_logo;

		$recruit_company->save();
		}

 		// $recruit_oi->corporations_id = $request->1;
 		$recruit_oi->corporations_id = 1;
 		$recruit_oi->recruit_company_id = $recruit_company_no->id;
 		$recruit_oi->recruit_ocupation = $request->recruiting_job_category_name;
 		$recruit_oi->open_status = 1;
 		$recruit_oi->job_title = $request->job_offer_title;
		$recruit_oi->job_feature= implode(",", $request->feature_offer_point); 
 		$recruit_oi->image_main = $request->main_image->store('storage/' . $recruit_oi->corporations_id);

		//イメージの処理（暫定）
		// $image_seq = $request->sub_image1;
		// if($image_seq->isValid()) {
		// }else{
		// 	$recruit_oi->image_sub_1 = $request->sub_image1->store('storage/' . $recruit_oi->corporations_id); ;
		// 	$recruit_oi->image_sub_2 = $request->sub_image2->store('storage/' . $recruit_oi->corporations_id); ;
		// 	$recruit_oi->image_sub_3 = $request->sub_image3->store('storage/' . $recruit_oi->corporations_id); ;
		// 	$recruit_oi->image_sub_4 = $request->sub_image4->store('storage/' . $recruit_oi->corporations_id); ;
		// 	$recruit_oi->image_sub_5 = $request->sub_image5->store('storage/' . $recruit_oi->corporations_id); ;
		// }

		$recruit_oi->marketing_use = $request->customer_acquisition_use_availability;
 		$recruit_oi->job_requirement = $request->required_requirement;
 		$recruit_oi->final_education = $request->last_educational_background;
 		$recruit_oi->applicable_age_from = $request->can_apply_age_more;
 		$recruit_oi->applicable_age_to = $request->can_apply_age_under;
 		$recruit_oi->company_number = $request->working_experience_company_number;
 		$recruit_oi->sex = $request->sex ;
 		$recruit_oi->inexperienced = $request->unexperienced_availability;
 		$recruit_oi->foregin_nationality = $request->foreign_nationality_availability;
 		$recruit_oi->english_level = $request->english_conversation_level;
 		$recruit_oi->chinese_level = $request->chinese_conversation_level;
 		$recruit_oi->recruit_period = $request->calender_area;
 		$recruit_oi->occupation_category_1 = $request->job_category1;
 		$recruit_oi->occupation_category_2 = $request->job_category2;
 		$recruit_oi->recruiting_plan_count = $request->recruiting_plan_count;
 		$recruit_oi->PV_count = 1;
 		$recruit_oi->calculation_method_performance_fee = $request->successful_reward_calculation_method;
 		$recruit_oi->Theoretical_annual = $request->ratio;
 		$recruit_oi->Theoretical_annual_income = $request->terms_at_rate;
 		$recruit_oi->fixed_reward = $request->fixed_reward_amount;
 		$recruit_oi->refund_policy = $request->refund_provision;
 		$recruit_oi->warning_text = $request->memo;
 		$recruit_oi->job_description = $request->job_content;
 		$recruit_oi->job_attraction = $request->work_appeal;
 		$recruit_oi->job_experience = $request->active_experience;
 		$recruit_oi->management_supervisor = $request->supervisor_job_offer;
 		$recruit_oi->department = $request->division_name;
 		$recruit_oi->department_detail = $request->division_detail;
 		$recruit_oi->employment = $request->employment_status;
 		$recruit_oi->working_time_type = $request->working_hours_type;
 		$recruit_oi->working_time = $request->working_hours;
 		$recruit_oi->working_hours_system = $request->working_hours_system_fixed_overtime_work_fare;
 		$recruit_oi->deemed_working_hours_system = $request->deemed_working_hours_system_type;
 		$recruit_oi->deemed_working_hours = $request->deemed_working_hours_per_one_day;
 		$recruit_oi->overtime_hours = $request->overtime_hours_detail;
 		$recruit_oi->short_working_hours_system = $request->shorter_working_hours_working;
 		$recruit_oi->short_working_hours_system_detail = $request->shorter_working_hours_working_detail;
 		$recruit_oi->selection_flow = implode(",", $request->selection_flow);
 		$recruit_oi->selection_detail = $request->selection_detail;
 		$recruit_oi->telework = $request->home_working;
 		$recruit_oi->telework_info = $request->home_working_detail;
 		$recruit_oi->salary_type = $request->payroll_type;
 		$recruit_oi->yearly_pay_amount_from = $request->yearly_pay_amount_more;
 		$recruit_oi->yearly_pay_amount_to = $request->yearly_pay_amount_under;
 		$recruit_oi->payment_method = $request->year_pay_method;
 		$recruit_oi->monthly_salaly_from = $request->monthly_pay_more;
 		$recruit_oi->monthly_salaly_to = $request->monthly_pay_under;
 		$recruit_oi->montyly_pay_assumption_annual_income_from = $request->assumption_annual_income_more;
 		$recruit_oi->montyly_pay_assumption_annual_income_to = $request->assumption_annual_income_under;
 		$recruit_oi->daily_salary_from = $request->dayly_wage_more;
 		$recruit_oi->daily_salary_to = $request->dayly_wage_under;
 		$recruit_oi->hourly_wage_from = $request->hourly_wage_more;
 		$recruit_oi->hourly_wage_to = $request->hourly_wage_under;
 		$recruit_oi->basic_salary = $request->base_salary_amount;
 		$recruit_oi->fixed_overtime_fee = $request->fixed_overtime_work_fee_amount;
 		$recruit_oi->fixed_overtime_hours = $request->fixed_overtime_work_time;
 		$recruit_oi->payment_for_fixed_overtime = $request->fixed_overtime_hours_excess_part_pay;
 		$recruit_oi->salary_treatment_detail = $request->payroll_treatment_detail;
 		$recruit_oi->trial_period = $request->testing_period;
 		$recruit_oi->trial_period_deatail = $request->testing_period_detail;
 		$recruit_oi->annual_holiday = $request->annual_holiday;
 		$recruit_oi->holiday_vacation = $request->holiday_leave;
 		$recruit_oi->welfare = $request->welfare_benefits;
 		$recruit_oi->counterplan_secound_hand_smok = $request->passive_smoking_control;
 		$recruit_oi->counterplan_secound_hand_smok_detail = $request->passive_smoking_control_ditail;

		$recruit_oi->save();
//勤務地詳細
	for ($i = 0; $i < count($request->loc01); $i++) {
		// DBオブジェクト生成
		$work_place = new \App\Models\WorkPlace;

		$work_place->recruit_offer_infos_id = $recruit_oi->id;
		$work_place->outsource_offer_infos_id = $recruit_oi->id;
		// $work_place->outsource_offer_infos_id = $outsource_oi->id;
		$work_place->post_number = $request->loc01[$i];
		$work_place->prefecture = $request->loc02[$i];
		$work_place->address = $request->loc03[$i];
		$work_place->nearest_station_line = $request->loc04[$i];
		$work_place->nearest_station = $request->loc05[$i];
		$work_place->nearest_station_distance = $request->loc06[$i];
		$work_place->work_location_detail = $request->loc07[$i];
		// 保存
 		$work_place->save();
	}
		// 一覧にリダイレクト
		 return redirect('job_offer_registration');

		}

  }

  public function update(Request $request, $id)
  {
		// dd($request);
		// dd($id);
		if($request->get('back')){
			return redirect('job_offer_registration')->withInput();
		}else{
		// DBオブジェクト生成
		$recruit_oi =  \App\Models\RecruitOfferInfo::where('id', $id)->first();
		$recruit_company_no = \App\Models\RecruitCompany::where('corporation_name', $request->company_name)->first();
		// dd($recruit_company_no);
		// dd($recruit_oi);

 		// $recruit_oi->corporations_id = $request->1;
 		$recruit_oi->corporations_id = 1;
 		$recruit_oi->recruit_company_id = $recruit_company_no->id;
 		$recruit_oi->recruit_ocupation = $request->recruiting_job_category_name;
 		$recruit_oi->open_status = 1;
 		$recruit_oi->job_title = $request->job_offer_title;
		$recruit_oi->job_feature= implode(",", $request->feature_offer_point); 
 		$recruit_oi->image_main = $request->main_image->store('storage/' . $recruit_oi->corporations_id);

		$recruit_oi->marketing_use = $request->customer_acquisition_use_availability;
 		$recruit_oi->job_requirement = $request->required_requirement;
 		$recruit_oi->final_education = $request->last_educational_background;
 		$recruit_oi->applicable_age_from = $request->can_apply_age_more;
 		$recruit_oi->applicable_age_to = $request->can_apply_age_under;
 		$recruit_oi->company_number = $request->working_experience_company_number;
 		$recruit_oi->sex = $request->sex ;
 		$recruit_oi->inexperienced = $request->unexperienced_availability;
 		$recruit_oi->foregin_nationality = $request->foreign_nationality_availability;
 		$recruit_oi->english_level = $request->english_conversation_level;
 		$recruit_oi->chinese_level = $request->chinese_conversation_level;
 		$recruit_oi->recruit_period = $request->calender_area;
 		$recruit_oi->occupation_category_1 = $request->job_category1;
 		$recruit_oi->occupation_category_2 = $request->job_category2;
 		$recruit_oi->recruiting_plan_count = $request->recruiting_plan_count;
 		$recruit_oi->PV_count = 1;
 		$recruit_oi->job_description = $request->job_content;
 		$recruit_oi->job_attraction = $request->work_appeal;
 		$recruit_oi->job_experience = $request->active_experience;
 		$recruit_oi->management_supervisor = $request->supervisor_job_offer;
 		$recruit_oi->department = $request->division_name;
 		$recruit_oi->department_detail = $request->division_detail;
 		$recruit_oi->employment = $request->employment_status;
 		$recruit_oi->working_time_type = $request->working_hours_type;
 		$recruit_oi->working_time = $request->working_hours;
 		$recruit_oi->working_hours_system = $request->working_hours_system_fixed_overtime_work_fare;
 		$recruit_oi->deemed_working_hours_system = $request->deemed_working_hours_system_type;
 		$recruit_oi->deemed_working_hours = $request->deemed_working_hours_per_one_day;
 		$recruit_oi->overtime_hours = $request->overtime_hours_detail;
 		$recruit_oi->short_working_hours_system = $request->shorter_working_hours_working;
 		$recruit_oi->short_working_hours_system_detail = $request->shorter_working_hours_working_detail;
 		$recruit_oi->selection_flow = implode(",", $request->selection_flow);
 		$recruit_oi->selection_detail = $request->selection_detail;
 		$recruit_oi->telework = $request->home_working;
 		$recruit_oi->telework_info = $request->home_working_detail;
 		$recruit_oi->salary_type = $request->payroll_type;
 		$recruit_oi->yearly_pay_amount_from = $request->yearly_pay_amount_more;
 		$recruit_oi->yearly_pay_amount_to = $request->yearly_pay_amount_under;
 		$recruit_oi->payment_method = $request->year_pay_method;
 		$recruit_oi->monthly_salaly_from = $request->monthly_pay_more;
 		$recruit_oi->monthly_salaly_to = $request->monthly_pay_under;
 		$recruit_oi->montyly_pay_assumption_annual_income_from = $request->assumption_annual_income_more;
 		$recruit_oi->montyly_pay_assumption_annual_income_to = $request->assumption_annual_income_under;
 		$recruit_oi->daily_salary_from = $request->dayly_wage_more;
 		$recruit_oi->daily_salary_to = $request->dayly_wage_under;
 		$recruit_oi->hourly_wage_from = $request->hourly_wage_more;
 		$recruit_oi->hourly_wage_to = $request->hourly_wage_under;
 		$recruit_oi->basic_salary = $request->base_salary_amount;
 		$recruit_oi->fixed_overtime_fee = $request->fixed_overtime_work_fee_amount;
 		$recruit_oi->fixed_overtime_hours = $request->fixed_overtime_work_time;
 		$recruit_oi->payment_for_fixed_overtime = $request->fixed_overtime_hours_excess_part_pay;
 		$recruit_oi->salary_treatment_detail = $request->payroll_treatment_detail;
 		$recruit_oi->trial_period = $request->testing_period;
 		$recruit_oi->trial_period_deatail = $request->testing_period_detail;
 		$recruit_oi->annual_holiday = $request->annual_holiday;
 		$recruit_oi->holiday_vacation = $request->holiday_leave;
 		$recruit_oi->welfare = $request->welfare_benefits;
 		$recruit_oi->counterplan_secound_hand_smok = $request->passive_smoking_control;
 		$recruit_oi->counterplan_secound_hand_smok_detail = $request->passive_smoking_control_ditail;

		$recruit_oi->save();
		// 一覧にリダイレクト
		 return redirect('job_offer_registration');
		
		}

  }


	

  public function edit_corp(Request $request)
  {
		// DBオブジェクト生成
		$recruit_company = \App\Models\RecruitCompany::where('id', $request->company_id)->first();
		$recruit_company->corporations_id = 1;
		$recruit_company->corporation_name = $request->company_name;
		$recruit_company->address = $request->comp_add02;
		$recruit_company->home_page = $request->company_hp;
		$recruit_company->employee_number = $request->employee_number;
		$recruit_company->establish_year = substr($request->foundation_date, 0,4);
		$recruit_company->establish_month = substr($request->foundation_date,-2);
		$recruit_company->company_profile = $request->company_overview;
		$recruit_company->business_content = $request->business_guidance;
		$recruit_company->prefecture = $request->comp_add01;
		$recruit_company->industry1 = $request->job1c;
		$recruit_company->industry2 = $request->job2c;
		$recruit_company->corporation_logo = $request->company_logo->store('public/' . $recruit_company->corporations_id);

		$recruit_company->save();
		 return redirect('job_offer_registration');
	}

  public function create_corp(Request $request)
  {
		// DBオブジェクト生成
		$corporation = new \App\Models\Corporation;
		$recruit_company = new \App\Models\RecruitCompany;

		// $RecruitCompany->corporations_id= $corporation->id;
		$recruit_company->corporations_id= 1;
		$recruit_company->corporation_name = $request->company_name;
		$recruit_company->prefecture = $request->comp_add01;
		$recruit_company->address = $request->comp_add02;
		$recruit_company->home_page = $request->company_hp;
		$recruit_company->industry1 = $request->job1c;
		$recruit_company->industry2 = $request->job2c;
		$recruit_company->employee_number = $request->employee_number;
		$recruit_company->establish_year = substr($request->foundation_date, 0,4);
		$recruit_company->establish_month = substr($request->foundation_date,-2);
		$recruit_company->company_profile = $request->company_overview;
		$recruit_company->business_content = $request->business_guidance;
		$recruit_company->corporation_logo = $request->company_logo->store('public/' . $recruit_company->corporations_id);
		// 保存
		$recruit_company->save();
		// 一覧にリダイレクト
		 return redirect('job_offer_registration');
  }


	public function get_content(Request $request){
		// dd($request);
		//
		$info_re = AllRecInfo::findOrFail($request->movecopy); 
		$rec_info = RecruitOfferInfo::select('id','job_title')->get();
		// $rec_info_re = AllRecInfo::find($request); 
		$rec_info_re = AllRecInfo::where('id', $request->movecopy)->first(); 
		$first = FirstIndustry::select('id','name')->get();
		$second = SecondIndustry::select('id','first_industry_id','name')->get();
		$first_category = FirstJobCategory::select('id','name')->get();
		$second_category = SecondJobCategory::select('id','first_job_category_id','name')->get();
		$prefectures = config('constants.prefectures');
		$charmpoints = config('constants.charmpoints');
		$recruit_company = RecruitCompany::get();
		$status = 1;
		// $corp = Corporation::get();
		$corp = VCorp::get();
		// $corp = 0;
		// $rec_info_re = RecruitOfferInfo::find($request);
		// dump($rec_info);
		dump($rec_info_re);
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
		// dd($rec_info_re);

		return view('/offer_comp/management_screen/offer_comp_management_view/job_offer_detail',
			compact('id',
							'rec_info_re'
			));
	}
}
