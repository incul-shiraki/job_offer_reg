@extends('layouts.app')
@if ($status == 1)
  @section('title', '新規業務委託案件の作成')
@elseif ($status  == 2)
  @section('title', '業務委託案件の編集')
@endif
@section('header')
  @component('components.headPart')
  @endcomponent
@endsection

@section('content')
<main class="main-content bgc-grey-100">
  <div id="mainContent">
  <!-- コピーから作成 -->
  @include('/offer_comp/business_commission/create_from_copy')

  <!-- 募集企業 -->
  @include('/offer_comp/business_commission/recruiting_company')

  <!-- 募集期間 -->
  @include('/offer_comp/recruitment/recruiting_period')

  <!-- 募集概要 -->
  @include('/offer_comp/business_commission/recruiting_overview')

  <!-- 勤務地 -->
  @include('/offer_comp/business_commission/working_place')

  <!-- 案件内容 -->
  @include('/offer_comp/business_commission/project_detail')

  <!-- 必須要件 -->
  @include('/offer_comp/business_commission/required_requirement')

  <!-- 募集要項 -->
  @include('/offer_comp/business_commission/offering_essential_point')

  <!-- 単価・精算時間・環境 -->
  @include('/offer_comp/business_commission/treatment')

  <div class="form-group row">
    <div class="col-sm-7 text-right">
      <button type="button" onclick="submit();" class="btn btn-primary update_page">更新してプレビュー</button>
      <button type="button" onclick="submit();" class="btn btn-primary create_page">保存してプレビュー</button>
    </div>
  </div>
  <div id='div_footer'>
    <div class="form-group row">
      <div class="col-sm-7 text-right">
        <button type="button" onclick="history.back();" class="btn btn-dark">キャンセル</button>
        <button type="button" onclick="submit();" class="btn btn-primary update_page">更新してプレビュー</button>
        <button type="button" onclick="submit();" class="btn btn-primary create_page">保存してプレビュー</button>
      </div>
    </div>
  </div>
</form>
<!-- 新規募集企業登録 -->
  @include('/offer_comp/business_commission/recruit_company_register')

<!-- 募集企業更新 -->
  @include('/offer_comp/business_commission/recruit_company_update')

<!-- スキルセット登録 -->
  @include('/offer_comp/business_commission/skill_select_modal')

<!-- 勤務地詳細登録 -->
  @include('/offer_comp/recruitment/working_place_modal')
  </div>
  <footer class="bdT ta-c p-30 lh-0 fsz-sm c-grey-600">
  </footer>
</main>
@endsection

  @component('components.footerScripts')
  @endcomponent

@section('css')

@endsection

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
<script>

$(function(){
  if (@json($rec_info_re) != 0) {
    var temp = @json($rec_info_re);
    var pref = @json($prefectures);
    var first = @json($first);
    var second = @json($second);

    //コントローラのアクションがnew以外(DBから値を引っ張ってきてる要素)
    //単純なセレクトボックスの値をここで指定する
    //集客利用の可否
    $('#customer_acquisition_use_availability').val(temp['marketing_use']);
    //在宅勤務
    $('#home_working').val(temp['telework']);
    //最終学歴
    $('#last_educational_background').val(temp['final_education']);
    //就業経験社数
    $('#working_experience_company_number').val(temp['company_number']);
    //性別
    $('#sex').val(temp['sex']);
    //未経験の可否
    $('#unexperienced_availability').val(temp['inexperienced']);
    //外国籍の可否
    $('#foreign_nationality_availability').val(temp['foregin_nationality']);
    //英語レベル
    $('#english_conversation_level').val(temp['english_level']);
    //中国語レベル
    $('#chinese_conversation_level').val(temp['chinese_level']);
    //募集予定人数
    $('#recruiting_plan_count').val(temp['recruiting_plan_count']);
    //雇用形態
    $('#employment_status').val(temp['employment']);
    //労働時間・固定残業代
    $('#working_hours_system_fixed_overtime_work_fare').val(temp['working_hours_system']);
    //みなし労働時間制の種類
    $('#deemed_working_hours_system_type').val(temp['deemed_working_hours_system_type']);
    //試験期間
    $('#testing_period').val(temp['trial_period']);
    //受動喫煙対策
    $('#passive_smoking_control').val(temp['counterplan_secound_hand_smok']);
    //成功報酬の算定方法
    $('#successful_reward_calculation_method').val(temp['calculation_method_performance_fee']);

    //input /textareaの値をここで指定
    //募集終了予定日
    $('#calender_area').val(temp['recruit_period']);
    //募集職種名
    $('#recruiting_job_category_name').val(temp['recruit_ocupation']);
    //求人タイトル
    $('#job_offer_title').val(temp['job_title']);
    //在宅勤務詳細
    $('#home_working_detail').val(temp['telework_info']);
    //仕事内容
    $('#job_content').val(temp['job_description']);
    //この仕事の醍醐味・魅力・得られるもの
    $('#work_appeal').val(temp['job_attraction']);
    //活躍できる経験
    $('#active_experience').val(temp['job_experience']);
    //必須要件・応募資格
    $('#required_requirement').val(temp['job_requirement']);
    //応募可能年齢(下限)
    $('#can_apply_age_more').val(temp['applicable_age_from']);
    //応募可能年齢(上限)
    $('#can_apply_age_under').val(temp['applicable_age_to']);
    //部署名
    $('#division_name').val(temp['department']);
    //部署詳細
    $('#division_detail').val(temp['department_detail']);
    //勤務時間タイプ
    $('#working_hours_type').val(temp['working_time_type']);
    //勤務時間
    $('#working_hours').val(temp['working_time']);
    //残業時間の詳細
    $('#overtime_hours_detail').val(temp['overtime_hours']);
    //時短勤務詳細
    $('#shorter_working_hours_working_detail').val(temp['short_working_hours_system_detail']);
    //選考詳細
    $('#selection_detail').val(temp['selection_detail']);
    //年俸額(下)
    $('#yearly_pay_amount_more').val(temp['yearly_pay_amount_from']);
    //年俸額(上)
    $('#yearly_pay_amount_under').val(temp['yearly_pay_amount_to']);
    //月給(下)
    $('#monthly_pay_more').val(temp['monthly_salaly_from']);
    //月給(上)
    $('#monthly_pay_under').val(temp['monthly_salaly_to']);
    //想定年収(万円)：下
    $('#assumption_annual_income_more').val(temp['montyly_pay_assumption_annual_income_from']);
    //想定年収(万円)：上
    $('#assumption_annual_income_under').val(temp['montyly_pay_assumption_annual_income_to']);
    //日給(下)
    $('#dayly_wage_more').val(temp['daily_salary_from']);
    //日給(上)
    $('#dayly_wage_under').val(temp['daily_salary_to']);
    //時給(下)
    $('#hourly_wage_more').val(temp['hourly_wage_from']);
    //時給(上)
    $('#hourly_wage_under').val(temp['hourly_wage_to']);
    //基本給の金額
    $('#base_salary_amount').val(temp['basic_salary']);
    //固定残業代の金額
    $('#fixed_overtime_work_fee_amount').val(temp['fixed_overtime_fee']);
    //固定残業時間
    $('#fixed_overtime_work_time').val(temp['fixed_overtime_hours']);
    //固定残業時間超過分の支給
    $('#fixed_overtime_hours_excess_part_pay').val(temp['payment_for_fixed_overtime']);
    //給与待遇の詳細
    $('#payroll_treatment_detail').val(temp['salary_treatment_detail']);
    //試験期間詳細
    $('#testing_period_detail').val(temp['trial_period_deatail']);
    //年間休日
    $('#annual_holiday').val(temp['annual_holiday']);
    //休日・休暇
    $('#holiday_leave').val(temp['holiday_vacation']);
    //福利厚生
    $('#welfare_benefits').val(temp['welfare']);
    //受動喫煙対策(詳細)
    $('#passive_smoking_control_ditail').val(temp['counterplan_secound_hand_smok_detail']);
    //割合(％)
    $('#ratio').val(temp['Theoretical_annual']);
    //割合時の規約
    $('#terms_at_rate').val(temp['Theoretical_annual_income']);
    //固定報酬額
    $('#fixed_reward_amount').val(temp['fixed_reward']);
    //返金規定
    $('#refund_provision').val(temp['refund_policy']);
    //memo
    $('#memo').val(temp['warning_text']);
  }
  
  //dbに値を登録してある項目の制御
  //業界１
  $('.job1c_group').html("");
  var first_indust_array = @json($first);
  $('.job1c_group').append('<option hidden class=\"not_select\">選択してください</option>');
  for ( var i = 0; i < first_indust_array.length; i++ ){
    $('.job1c_group').append('<option  value=' + first_indust_array[i]['id'] + '>' + first_indust_array[i]['name']+ '</option>');
  }

  //業界２(新規作成/募集企業登録)
  $('#job1c_list').change(function() {
    var num = $('#job1c_list').val();
    $('#job2c_list').html("");
    var second_indust_array = @json($second);
    $('#job2c_list').append('<option hidden class=\"not_select\">選択してください</option>');
    for ( var i = 0; i < second_indust_array.length; i++ ){
      if (num == second_indust_array[i]['first_industry_id']) {
        $('#job2c_list').append('<option  value=' + second_indust_array[i]['id'] + ' data-val=' + second_indust_array[i]['first_industry_id'] + '>' + second_indust_array[i]['name']+ '</option>');
      }
    }
    });

  //業界２(新規作成/募集企業選択からの編集/first)
  $('select#corp_link').change(function(){
    var num = $('#job1c_edit').val();
    $('#job2c_edit').html("");
    var second_indust_array = @json($second);
    for ( var i = 0; i < second_indust_array.length; i++ ){
      if (num == second_indust_array[i]['first_industry_id']) {
        $('#job2c_edit').append('<option  value=' + second_indust_array[i]['id'] + ' data-val=' + second_indust_array[i]['first_industry_id'] + '>' + second_indust_array[i]['name']+ '</option>');
      }
    }
  })
  //業界２(新規作成/募集企業選択からの編集/after_second)
  $('#job1c_edit').change(function() {
    var num = $('#job1c_edit').val();
    $('#job2c_edit').html("");
    var second_indust_array = @json($second);
    $('#job2c_edit').append('<option hidden class=\"not_select\">選択してください</option>');
    for ( var i = 0; i < second_indust_array.length; i++ ){
      if (num == second_indust_array[i]['first_industry_id']) {
        $('#job2c_edit').append('<option  value=' + second_indust_array[i]['id'] + ' data-val=' + second_indust_array[i]['first_industry_id'] + '>' + second_indust_array[i]['name']+ '</option>');
      }
    }
  });

    
//checkbox/radio系の処理
  if (@json($rec_info_re) != 0) {
  //訴求ポイントのチェックをつける
    const feature_str = @json($rec_info_re['job_feature']);
    var feature_array =feature_str.split(',');
    for ( var i = 0; i < feature_array.length; i++ ){
      $('input[id="feature_' + feature_array[i] + '"' + ']').prop("checked",true);
    }

  //給与支払い方法のラジオを選択
    const payroll_str = @json($rec_info_re['salary_type']);
      $('input:radio[name="payroll_type"]').val([payroll_str]);
    if($('[id=payroll_type1]').prop('checked')){
      act_year_set();
      dis_month_set();
      dis_day_set();
      dis_time_set();
    }else if($('[id=payroll_type2]').prop('checked')){
      dis_year_set();
      act_month_set();
      dis_day_set();
      dis_time_set();
    }else if($('[id=payroll_type3]').prop('checked')){
      dis_year_set();
      dis_month_set();
      act_day_set();
      dis_time_set();
    }else if($('[id=payroll_type4]').prop('checked')){
      dis_year_set();
      dis_month_set();
      dis_day_set();
      act_time_set();
    }

  //管理監督者の求人のラジオを選択
    const supervisor_str = @json($rec_info_re['management_supervisor']);
      $('input:radio[name="supervisor_job_offer"]').val([supervisor_str]);

  //時短勤務のラジオを選択
    const short_work_str = @json($rec_info_re['short_working_hours_system']);
      $('input:radio[name="shorter_working_hours_working"]').val([short_work_str]);

  //支払い方法の選択のラジオを選択
    const year_pay_str = @json($rec_info_re['payment_method']);
      $('input:radio[name="year_pay_method"]').val([year_pay_str]);
  }

  //追従フッターの制御
  $(window).on("scroll", function() {
    //コピーから作成と通常の作成で分岐
    //画面全体の高さと開始点＋現在地点の値が一致する場合にフッターを非表示にする
    var scrollHeight = $(document).height();
      // console.log(scrollHeight);
    var scrollPosition = window.innerHeight + $(window).scrollTop();
      // console.log(scrollPosition);
    if ((scrollHeight - scrollPosition) === 0) {
        // スクロールでページ最下部で発火する
      $('#div_footer').after().hide();
    } else {
      $('#div_footer').show();
    }
  });

  //編集・新規作成に応じて表示非表示の切り替え
  if(@json($status) == 1) {
    $('.create_page').show();
    $('.update_page').after().hide();
  }else if(@json($status) == 2){
    //編集時に表示する項目
    $('.update_page').show();
    //編集時に非表示にする項目
    $('.create_page').after().hide();
  
  //報酬の支払い方法の制御
  var edit_suc_val = $('#edit_successful_reward_calculation_method_h').val();
  if (edit_suc_val == 1) {
    $('.chois_ratio').show();
    $('.not_chois_ratio').after().hide();
  }else if (edit_suc_val == 2) {
    $('.not_chois_ratio').show();
    $('.chois_ratio').after().hide();
  } 

  }
})

</script>
@endsection

