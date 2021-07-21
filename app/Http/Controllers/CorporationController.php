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


class CorporationController extends Controller
{
//求人情報登録画面の描画
  //コピーから作成用に求人情報テーブルからログイン企業ごとの求人タイトルと求人情報IDを取得

  public function form()
  {
    $rec_info_re = 0;
    $work_place = 0;
    $status = 1;
    $copy = 0;
    list($corp, $corp_rec, $first, $first_category, $second, $second_category, $prefectures, $charmpoints, $selection_flows, $rec_info, $recruit_company) = $this->dataCollection();
    return view('/offer_comp/recruitment/job_offer_registration', 
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
              'charmpoints',
              'selection_flows',
              'rec_info',
              'recruit_company'
      )
    );
  }

  public function edit($id)
  {
    $rec_info_re = AllRecInfo::findOrFail($id);
    $work_place = WorkPlace::where('recruit_offer_infos_id', $rec_info_re['id'])->get();
    $status = 2;
    $copy = 0;
    list($corp, $corp_rec, $first, $first_category, $second, $second_category, $prefectures, $charmpoints, $selection_flows, $rec_info, $recruit_company) = $this->dataCollection();
    return view('/offer_comp/recruitment/job_offer_registration', 
      compact('rec_info_re',
              'copy',
              'work_place',
              'status',
              'corp',
              'corp_rec',
              'first',
              'first_category',
              'second',
              'second_category',
              'prefectures',
              'charmpoints',
              'selection_flows',
              'rec_info',
              'recruit_company'
      )
    );
  }
  
  //debug用
  public function new_confirm(Request $req)
  {
    $data = $req->all();
    $first = \DB::table('first_industries')->get();
    $second = \DB::table('second_industries')->get();
    
    return view('/conf_posts')->with($data);
  }

  public function create(Request $request)
  {
    if($request->get('back')){
      return view('/offer_comp/recruitment/job_offer_registration')->withInput();
    }else{
    $count = \App\Models\RecruitCompany::where('corporation_name', $request->company_name)->count();

    if ($count == 0) {
    // 募集企業登録で登録していない企業を登録
      $recruitCompanyInsertData = $this->setupDataRecruitCompany($request);
      $recruitCompanyDb = RecruitCompany::create($recruitCompanyInsertData);
    }

  //求人情報
    if($request->copyvalue > 0){
      //DBから対象のレコードをセレクト
      $db_data = RecruitOfferInfo::where('id',$request->copyvalue)->first();

      $imagesArray_req = $this->createImagesArray($request);
      $imagesArray_db = $this->createImagesArrayForDb($db_data);
      //リクエスト側のデータを基準に値がないカラムにDBで設定されている値を渡す
      //リクエスト側にデータがある場合はDBに保存されているパスの画像を消去する
      foreach ($imagesArray_req as $key => $value){
        $imagesArray_req[$key] = $this->imageExecuteForCreate($imagesArray_db[$key],$value);
      }
    }
    $this->transferValue($request,$imagesArray_req);
    
    $recruitOfferInfoInsertData = $this->setupDataRecruitOfferInfo($request);
    $recruitOfferInfoDb = RecruitOfferInfo::create($recruitOfferInfoInsertData);

  //勤務地詳細
    $workPlaceInsertData = $this->setupDataWorkPlace($request,$recruitOfferInfoDb->id);
    $workPlaceDb = WorkPlace::insert($workPlaceInsertData);

    // 一覧にリダイレクト
    return redirect()->route('job_offer_registration');
    }
  }

  public function update(Request $request, $id)
  {
    if($request->get('back')){
      return view('/offer_comp/recruitment/job_offer_registration')->withInput();
    }else{
  //求人情報更新

    //DBから対象のレコードをセレクト
    $db_data = RecruitOfferInfo::where('id',$id)->first();
    //リクエストとDBに格納済みの画像データ群をそれぞれ配列化
    $imagesArray_req = $this->createImagesArray($request);
    $imagesArray_db = $this->createImagesArrayForDb($db_data);
    //リクエスト側のデータを基準に値がないカラムにDBで設定されている値を渡す
    //リクエスト側にデータがある場合はDBに保存されているパスの画像を消去する
    foreach ($imagesArray_req as $key => $value){
      $imagesArray_req[$key] = $this->imageExecute($imagesArray_db[$key],$value);
    }
    $this->transferValue($request,$imagesArray_req);
    
    $recruitOfferInfoUpdateData = $this->setupDataRecruitOfferInfo($request);
    $recruitOfferInfoDb = RecruitOfferInfo::where('id', $id)->update($recruitOfferInfoUpdateData);
  //勤務地情報更新
    $WorkPlaceDb = WorkPlace::where('recruit_offer_infos_id', $id)->delete();
    $workPlaceInsertData = $this->setupDataWorkPlace($request,$id);
    $workPlaceDb = WorkPlace::insert($workPlaceInsertData);

    // 一覧にリダイレクト
     // return view('/offer_comp/recruitment/job_offer_registration');
    return $this->show_offer_detail($id);
    }
  }

  public function edit_corp(Request $request)
  {
    // リクエストのロゴがからの場合、既存のデータを使う
    $db_data = RecruitCompany::where('id', $request->company_id)->first();
    $request->company_logo = $this->imageExecute($db_data->corporation_logo,$request->company_logo);

    $recruitCompanyInsertData = $this->setupDataRecruitCompany($request);
    // 保存して一覧にリダイレクト
    $recruitCompanyDb = RecruitCompany::where('id', $request->company_id)->update($recruitCompanyInsertData);
    return back(); 
  }

  public function create_corp(Request $request)
  {
    // DBオブジェクト生成
    $recruitCompanyInsertData = $this->setupDataRecruitCompany($request);

    // 保存して一覧にリダイレクト
    $recruitCompanyDb = RecruitCompany::create($recruitCompanyInsertData);
    return back(); 
    // return view('/offer_comp/recruitment/job_offer_registration');
  }

  public function get_content(Request $request)
  {
    list($corp, $corp_rec, $first, $first_category, $second, $second_category, $prefectures, $charmpoints, $selection_flows, $rec_info, $recruit_company) = $this->dataCollection();
    $info_re = AllRecInfo::findOrFail($request->movecopy);
    $rec_info_re = AllRecInfo::where('id', $request->movecopy)->first();
    $work_place = WorkPlace::where('recruit_offer_infos_id', $rec_info_re['id'])->get();
    $status = 1;
    $copy = $request->movecopy;
    return view('/offer_comp/recruitment/job_offer_registration', 
      compact(
        'rec_info',
        'copy',
        'rec_info_re',
        'first',
        'second',
        'first_category',
        'second_category',
        'corp',
        'charmpoints',
        'selection_flows',
        'prefectures',
        'info_re',
        'work_place',
        'status',
        'recruit_company'
      ));
  }

  public function show_lead_offer_detail($id){
      $rec_info_re = AllRecInfo::findOrFail($id);

    return view('/offer_comp/business_commission/lead_offer_detail',
      compact('id',
              'rec_info_re'
      ));
  }

  public function show_offer_detail($id){
      $rec_info_re = AllRecInfo::findOrFail($id);

    return view('/offer_comp/recruitment/job_offer_detail',
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
      $selection_flows = config('constants.selection_flows');
      $rec_info = RecruitOfferInfo::select('id','job_title')->get();
      $recruit_company = RecruitCompany::get();
      return[$corp, $corp_rec, $first, $first_category, $second, $second_category, $prefectures, $charmpoints, $selection_flows, $rec_info, $recruit_company];
    }

    private function setupDataRecruitCompany(Request $request)
    {
      $corporation = Corporation::where('id', 1)->first();
      $logo_name = $this->selectTypeExecute($request->company_logo, 300, 'logo', $corporation->id);

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
                    'corporation_logo' => $logo_name 
      ];
      return   $insertArray;
    }

    private function setupDataRecruitOfferInfo(Request $request)
    {
      $recruit_company_no = \App\Models\RecruitCompany::where('corporation_name', $request->company_name)->first();
      $corporation = Corporation::where('id', 1)->first();
      $imagesArray = $this->createImagesArray($request);
      $image_box = [];
      foreach ($imagesArray as $key => $value){
        $image_name = $this->selectTypeExecute($value, 300, $key, $corporation->id);
        array_push($image_box,$image_name);
      }
      $insertArray = ['corporations_id' => 1,
                      'recruit_company_id' => $recruit_company_no->id,
                      'recruit_ocupation' => $request->recruiting_job_category_name,
                      'open_status' => 1,
                      'job_title' => $request->job_offer_title,
                      'job_feature' => implode(",", $request->feature_offer_point),
                      'image_main' =>  $image_box[0],
                      'image_sub_1' => $image_box[1],
                      'image_sub_2' => $image_box[2],
                      'image_sub_3' => $image_box[3],
                      'image_sub_4' => $image_box[4],
                      'image_sub_5' => $image_box[5],
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
                      'selection_flow' => implode(",", $request->select_flow),
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
    
    private function setupDataWorkPlace(Request $request, $id)
    {
      // $recruitOfferInfoInsertData = $this->setupDataRecruitOfferInfo($request);
      for ($i = 0; $i < count($request->loc01); $i++) { 
        $tempArray = [
          'recruit_offer_infos_id' => $id,
          'outsource_offer_infos_id' => $id,
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
    //イメージの配列を作成
    private function createImagesArray(Request $request)
    {
      $imagesArray =[
        'main' => $request->main_image,
        'sub_1' => $request->sub_image1,
        'sub_2' => $request->sub_image2,
        'sub_3' => $request->sub_image3,
        'sub_4' => $request->sub_image4,
        'sub_5' => $request->sub_image5
      ];
      return $imagesArray;
    }

    //DB側のイメージの配列を作成
    private function createImagesArrayForDb($db_data)
    {
      $imagesArray =[
        'main' => $db_data->image_main,
        'sub_1' => $db_data->image_sub_1,
        'sub_2' => $db_data->image_sub_2,
        'sub_3' => $db_data->image_sub_3,
        'sub_4' => $db_data->image_sub_4,
        'sub_5' => $db_data->image_sub_5
      ];
      return $imagesArray;
    }

    //イメージの配列を作成
    private function transferValue(Request $request,$array)
    {
      $request->main_image = $array['main'];
      $request->sub_image1 = $array['sub_1'];
      $request->sub_image2 = $array['sub_2'];
      $request->sub_image3 = $array['sub_3'];
      $request->sub_image4 = $array['sub_4'];
      $request->sub_image5 = $array['sub_5'];
    }


  //リクエストデータの画像ファイルに対して内容の確認後
  //空なら既存データを返す
  //空でない場合既存データを削除する
  private function imageExecute($db_data,$image)
  {
    if(is_null($image)) {
      return $db_data;
    }else{
      $temp_image = explode('/', $db_data);
      Storage::disk('public')->delete($temp_image[1]. '/' . $temp_image[2]);
      return $image;
    }
  }
  
  //コピーから作成する場合、既存データをコピーする（親側のデータで消された場合参照できる画像がなくなるため）
  private function imageExecuteForCreate($db_data,$image)
  {
    if(is_null($image)) {
      if(is_null($db_data)){
        return null;
      }
      $temp_image = explode('/', $db_data);
      // $title_end = explode('_', $temp_image[2]);
      $title_end = substr($temp_image[2],16);
      $now = date('Ymd_His'); 
      Storage::disk('public')->copy($temp_image[1]. '/' . $temp_image[2], $temp_image[1]. '/'. $now. '_'. $title_end);
      return $temp_image[0]. '/'. $temp_image[1]. '/'. $now. '_'. $title_end[2];
    }else{
      return $image;
    }
  }

  private function selectTypeExecute($image,$size,$word,$corp_id)
  {
    if(gettype($image) == 'string'){
      return $image;
    }else if(gettype($image) == 'object'){
      $temp_image = \InterventionImage::make($image);
      $temp_image->orientate();
      $temp_image->resize($size,null,
        function($constraint){
          $constraint->aspectRatio();
          $constraint->upsize();
        }
      );
      $now = date('Ymd_His') . '_' . $word . '.png';
      $temp_image->save(storage_path('app/public/' .$corp_id . '/' . $now));
      $path_name = 'storage/'. $corp_id .'/'. $temp_image->basename;
      return $path_name;
    }else{
      return null;
      }
  }
}
