//業界のプルダウンを連動させる
var $job2 = $('#job2c');
 var original_j = $job2.html();
 $('#job1c').change(function() {
   var job1val = $(this).val();

   $job2.html(original_j).find('option').each(function() {
   var job2val = $(this).data('val');

   if (job1val != job2val) {
     $(this).not(':first-child').remove();
   }
 });
//業界１が未入力の場合入力不可にする
 if ($(job1c).val() == "") {
   $job2.prop('disabled', true);
 } else {
   $job2.prop('disabled', false);
 }
});

$(function(){
  var job = $job2.html();
  var job1val = $('#job1c').val();
   $job2.html(job).find('option').each(function() {
   var job2val = $(this).data('val');
  if(job1val != job2val) {
    $(this).not(':first-child').remove();
  }
  });
});
;

//職種カテゴリーのプルダウンを連動させる
 var $job_category2 = $('#job_category2');
 var original_jc = $job_category2.html();
 $('#job_category1').change(function() {
   var job1_category_val = $(this).val();

   $job_category2.html(original_jc).find('option').each(function() {
   var job2_category_val = $(this).data('val_jc');

   if (job1_category_val != job2_category_val) {
     $(this).not(':first-child').remove();
   }
 });
//カテゴリー１が未入力の場合入力不可にする
 if ($(job_category1).val() == "") {
   $job_category2.prop('disabled', true);
 } else {
   $job_category2.prop('disabled', false);
 }
});

$(function(){
  var job_category  = $job_category2.html();
  var job_category_val = $('#job_category1').val();
   $job_category2.html(job_category).find('option').each(function() {
   var job_category_val2 = $(this).data('val_jc');
  if(job_category_val != job_category_val2) {
    $(this).not(':first-child').remove();
  }
  });
});


//訴求ポイントのチェック数の最大値を８に設定する
function click_cb(){
  //チェックカウント用変数
  var check_count = 0;
  // 箇所チェック数カウント
  $(".input_item label").each(function(){
      var parent_checkbox = $(this).children("input[type='checkbox']");
      if(parent_checkbox.prop('checked')){
        check_count = check_count + 1;
      }
  });
  // 0個のとき（チェックがすべて外れたとき）
  if(check_count == 0){
    $(".input_item label").each(function(){
      $(this).find(".locked").removeClass("locked");
    });
  //8個以上の時（チェック可能上限数）
  }else if(check_count > 8){
    $(".input_item label").each(function(){
      //チェックされていないチェックボックスをロックする
      if(!$(this).children("input[type='checkbox']").prop('checked')){
        $(this).children("input[type='checkbox']").prop('disabled',true);
        $(this).addClass("locked");
      }
    });
  }else{
    $(".input_item label").each(function(){
      if(!$(this).children("input[type='checkbox']").prop('checked')){
        $(this).children("input[type='checkbox']").prop('disabled',false);
        $(this).removeClass("locked");
      }
    });
  }
  return false;
}

//勤務タイプのテンプレート
var temp1 = ` 
●●:●● 〜 ●●:●●
所定労働時間：●●時間、休憩●●時間
`;

var temp2 = `
フレックスタイム制（1日の平均労働時間：●●時間）
コアタイム：●●:●● 〜 ●●:●●
●●:●● 〜 ●●:●●の時間帯に勤務している社員が多いです。
`; 

var temp3 = `
フレックスタイム制（1日の平均労働時間：●●時間）
コアタイムなし
※●●:●● 〜 ●●:●●の時間帯に勤務している社員が多いです。
`; 

var temp4 = `
●●:●● 〜 ●●:●●
1日の労働時間：●●時間、休憩●●時間
1ヶ月単位の変形労働時間制（週の平均労働時間●●時間以下）
`; 

var temp5 = `
●●:●● 〜 ●●:●●
1日の労働時間：●●時間、休憩●●時間
1年単位の変形労働時間制（週の平均労働時間●●時間以下）
`; 

var temp6 = `
裁量労働時間制
1日のみなし労働時間：●●時間
※●●:●● 〜 ●●:●●の時間帯に勤務している社員が中心です。
`; 

var temp7 = `
`; 
//勤務タイプのテンプレートをテキストエリアに表示
 $('#template').change(function() {
   var num = $(this).val();
  
  if(num == 1){
    $('#working_hours_type').val(temp1);
  }else if(num == 2){
    $('#working_hours_type').val(temp2);
  }else if(num == 3){
    $('#working_hours_type').val(temp3);
  }else if(num == 4){
    $('#working_hours_type').val(temp4);
  }else if(num == 5){
    $('#working_hours_type').val(temp5);
  }else if(num == 6){
    $('#working_hours_type').val(temp6);
  }else if(num == 7){
    $('#working_hours_type').val(temp7);
  }
 });

//管理監督者の募集の可否に応じて登録画面の項目変更
//労働時間制・固定残業代の表示非表示
$(function(){
  $('[name="supervisor_job_offer"]:radio').change(function() {
    if($('[id=supervisor_job_offer1]').prop('checked')){
      $('#hide_menu1').show();
      if($('#working_hours_system_fixed_overtime_work_fare').val() == 3){
        $('#hide_menu2').show();
        $('#hide_menu3').show();
      }
    }else if($('[id=supervisor_job_offer2]').prop('checked')){
      $('#hide_menu1').after().hide();
      $('#hide_menu2').after().hide();
      $('#hide_menu3').after().hide();
    }
  });
});


//みなし労働時間制、固定残業代制を選択した際の登録画面の描画変更
$(function(){
  $('#working_hours_system_fixed_overtime_work_fare').change(function() {
    var work_h_s_f_o_w_f = $(this).val();
    if (work_h_s_f_o_w_f == 1 ) {
      $('#hide_menu2').after().hide();
      $('#hide_menu3').after().hide();
      $('#hide_menu4').after().hide();
      $('#hide_menu5').after().hide();
      $('#hide_menu6').after().hide();
      $('#hide_menu7').after().hide();
    }else if (work_h_s_f_o_w_f == 2) {
      $('#hide_menu4').show();
      $('#hide_menu5').show();
      $('#hide_menu6').show();
      $('#hide_menu7').show();
      $('#hide_menu2').after().hide();
      $('#hide_menu3').after().hide();
    }else if (work_h_s_f_o_w_f == 3) {
      $('#hide_menu2').show();
      $('#hide_menu3').show();
      $('#hide_menu4').after().hide();
      $('#hide_menu5').after().hide();
      $('#hide_menu6').after().hide();
      $('#hide_menu7').after().hide();
    }
   });
});


$(function(){
  $('[name="payroll_type"]:radio').change(function() {
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
  });
});


function act_year_set () {
  $('#year_pay').show();
  $('#year_pay_method').show();
  $('#yearly_wage_more').prop('disabled', false);
  $('#yearly_wage_under').prop('disabled', false);
  $('#payment_methods').prop('disabled', false);
}

function dis_year_set () {
  $('#year_pay').after().hide();
  $('#year_pay_method').after().hide();
  $('#yearly_wage_more').prop('disabled', true);
  $('#yearly_wage_under').prop('disabled', true);
  $('#payment_methods').prop('disabled', true);
}

function act_month_set () {
  $('#month_pay').show();
  $('#12month_pay').show();
  $('#monthly_pay_more').prop('disabled', false);
  $('#monthly_pay_under').prop('disabled', false);
  $('#assumption_annual_income_more').prop('disabled', false);
  $('#assumption_annual_income_under').prop('disabled', false);
}

function dis_month_set () {
  $('#month_pay').after().hide();
  $('#12month_pay').after().hide();
  $('#monthly_pay_more').prop('disabled', true);
  $('#monthly_pay_under').prop('disabled', true);
  $('#assumption_annual_income_more').prop('disabled', true);
  $('#assumption_annual_income_under').prop('disabled', true);
}

function act_day_set () {
  $('#day_pay').show();
  $('#dayly_wage_more').prop('disabled', false);
  $('#dayly_wage_under').prop('disabled', false);
}

function dis_day_set () {
  $('#day_pay').after().hide();
  $('#dayly_wage_more').prop('disabled', true);
  $('#dayly_wage_under').prop('disabled', true);
}

function act_time_set () {
  $('#time_pay').show();
  $('#hourly_wage_more').prop('disabled', false);
  $('#hourly_wage_under').prop('disabled', false);
}

function dis_time_set () {
  $('#time_pay').after().hide();
  $('#hourly_wage_more').prop('disabled', true);
  $('#hourly_wage_under').prop('disabled', true);
}

//福利厚生テキスト
var welfare_benefits= ` 社内保険完備(雇用保険、労災、厚生年金、健康保険)
`;

    $('#welfare_benefits').val(welfare_benefits);
//エージェント情報の埋め込みテキスト
var agent1 = ` ・「月額固定給×12ヶ月＋賞与算定基準額×前年度実績賞与支給月数」のことを指します。
・月額固定給は「基本給＋家族手当＋住宅手当＋役職手当＋その他諸手当」で算出。
・通勤交通費、時間外・休日・深夜労働等の変動する割増賃金は月額固定給に含みません。
・年俸制の場合は、年俸額を理論年収とします。
`;

var agent2 = `1ヶ月以内：75% 1ヶ月～3ヶ月以内：50%"
`; 

var agent3 = `※紹介手数料又は返金規定の条件について、
当社と別途個別に合意頂いている登録企業様におかれましても、
こちらの求人票において条件を設定された場合には、
こちらの求人票において設定された条件にて合意が成立し、
この求人票の条件が優先して適用されますのでご注意ください。
`; 
    $('#terms_at_rate').val(agent1);
    $('#refund_provision').val(agent2);
    $('#memo').val(agent3);

//成功報酬の算定方法の選択による項目の変更
$(function(){
  $('#successful_reward_calculation_method').change(function() {
    var successful_rewar = $(this).val();
    if (successful_rewar == 1 ) {
      $('.chois_ratio').show();
      $('.not_chois_ratio').after().hide();
    }else if (successful_rewar == 2) {
      $('.not_chois_ratio').show();
      $('.chois_ratio').after().hide();
    }
   });
});

//募集終了日の有無に応じてカレンダーの表示非表示を制御
$(function(){                                                                
  $('#recruiting_end_expected_date').change(function(){
    $('#calender_area_view').toggle();
  });
});                                                                 

//その他の求人情報からコピーして作成するにチェックを入れた際に、表示する
$(function(){                                                                
  $('#other_recruit').change(function(){
    $('#makecopy').toggle();
  });
});                                                                 

//管理監督者の求人の制御
$(function(){
  if ($("input:checkbox[name='recruiting_end_expected_date']:checked").val() == 1) {
    $('#calender_area_view').after().hide();
  }else{
    $('#calender_area_view').show();
  }
});


//時短勤務の可不可に応じた詳細テキストエリアの表示非表示の切り替え             
$(function(){                                                                
  $('[name="shorter_working_hours_working"]:radio').change(function() {               
    if($('[id=shorter_working_hours_working1]').prop('checked')){                     
      $('#short_work').after().hide();                                               
    }else if($('[id=shorter_working_hours_working2]').prop('checked')){               
      $('#short_work').show();
    }                                                                        
  });                                                                        
});                                                                          


//給与支払いタイプ制御
$(function(){
  if ($("input:radio[name='payroll_type']:checked").val() == 1) {
    act_year_set();
    dis_month_set();
    dis_day_set();
    dis_time_set();
  }else if ($("input:radio[name='payroll_type']:checked").val() == 2) {
    dis_year_set();
    act_month_set();
    dis_day_set();
    dis_time_set();
  }else if ($("input:radio[name='payroll_type']:checked").val() == 3) {
    dis_year_set();
    dis_month_set();
    act_day_set();
    dis_time_set();
  }else if ($("input:radio[name='payroll_type']:checked").val() == 4) {
    dis_year_set();
    dis_month_set();
    dis_day_set();
    act_time_set();
  }
});


//時短勤務の制御
$(function(){
  if ($("input:radio[name='shorter_working_hours_working']:checked").val() == 1) {
    $('#short_work').after().hide();
  }else if ($("input:radio[name='shorter_working_hours_working']:checked").val() == 2) {
    $('#short_work').show();
  }
});

//管理監督者の求人の制御
$(function(){
  if ($("input:radio[name='supervisor_job_offer']:checked").val() == 1) {
    $('#hide_menu1').show();
    if($('#working_hours_system_fixed_overtime_work_fare').val() == 3){
      $('#hide_menu2').show();
      $('#hide_menu3').show();
    }
  }else if ($("input:radio[name='supervisor_job_offer']:checked").val() == 2) {
    $('#hide_menu1').after().hide();
    $('#hide_menu2').after().hide();
    $('#hide_menu3').after().hide();
  }
});

//試験期間の有無に応じた詳細テキストエリアの表示非表示の切り替え
$(function(){
  $('#testing_period').change(function() {
    var test_part = $(this).val();
    if (test_part == 1 ) {
      $('#test_part_detail').show();
    }else if (test_part == 2) {
      $('#test_part_detail').after().hide();
    }
   });
});

$(function(){
  if ($('#testing_period').val() == 1) {
    $('#test_part_detail').show();
  }else if ($('#testing_period').val() == 2) {
    $('#test_part_detail').after().hide();
  }else if ($('#testing_period').val() == "選択してください") {
    $('#test_part_detail').after().hide();
  } 
});

//労働時間制・固定残業代の制御
$(function(){
  if ($('#working_hours_system_fixed_overtime_work_fare').val() == 1) {
    $('#hide_menu2').after().hide();
    $('#hide_menu3').after().hide();
    $('#hide_menu4').after().hide();
    $('#hide_menu5').after().hide();
    $('#hide_menu6').after().hide();
    $('#hide_menu7').after().hide();
  }else if ($('#working_hours_system_fixed_overtime_work_fare').val() == 2) {
    $('#hide_menu2').after().hide();
    $('#hide_menu3').after().hide();
    $('#hide_menu4').show();
    $('#hide_menu5').show();
    $('#hide_menu6').show();
    $('#hide_menu7').show();
  }else if ($('#working_hours_system_fixed_overtime_work_fare').val() == 3) {
    if ($("input:radio[name='supervisor_job_offer']:checked").val() == 2) { 
      $('#hide_menu2').after().hide();
      $('#hide_menu3').after().hide();
    }else {
      $('#hide_menu2').show();
      $('#hide_menu3').show();
    }
    $('#hide_menu4').after().hide();
    $('#hide_menu5').after().hide();
    $('#hide_menu6').after().hide();
    $('#hide_menu7').after().hide();
  } 
});

//報酬の支払い方法の制御
$(function(){
  if ($('#successful_reward_calculation_method').val() == 1) {
    $('.chois_ratio').show();
    $('.not_chois_ratio').after().hide();
  }else if ($('#successful_reward_calculation_method').val() == 2) {
    $('.not_chois_ratio').show();
    $('.chois_ratio').after().hide();
  } 
});

//ページロード時に非表示や入力不可の初期設定をする
window.onload = function() {
  $('#makecopy').after().hide();                                               
  $('.btn-remove').after().hide();

  if ($('#job1c').val() == "選択してください") {
    $job2.prop('disabled', true);
  }
  if ($('#job_category1').val() == "選択してください") {
    $job_category2.prop('disabled', true);
  }
}

