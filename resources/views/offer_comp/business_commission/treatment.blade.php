<!-- job_offer_registrationのパーツ -->
<!-- 単価・精算時間・環境 -->
<div class="row">
  <div class="masonry-item col-md-2 d-none d-lg-block d-xl-block d-md-block col-12">&nbsp;</div>
  <div class="col-md-8 col-12">
    <div class="card">
      <div class="card-header">
        <h3 class='card_title'>単価・精算時間・環境</h3>
      </div>
      <div class="card-body">
        <div class="masonry-item">
            <div class="form-group row"><label for="payroll_type" class="col-sm-3 col-form-label">単価&nbsp;<span class="text-danger required">*</span></label>
              <div class="col-sm-9">
                <div style="display:block;"><input type="radio" name="payroll_type" value=2 class="payroll_type" id="payroll_type2" {{ old('payroll_type',1) == 2 ? 'checked' : '' }}><label for="payroll_type2" class="check_radio_label">月額単価</label></div>
                <div style="display:block;"><input type="radio" name="payroll_type" value=4 class="payroll_type" id="payroll_type4" {{ old('payroll_type',1) == 4 ? 'checked' : '' }}><label for="payroll_type4" class="check_radio_label">時給単価</label></div>
								<div class="col-sm-12 form-inline">
									<input type="text" class="col-sm-5 form-control" name="pay_more" id="pay_more">
									<b>&nbsp;〜&nbsp;</b>
									<input type="text" class="col-sm-5 form-control" name="pay_under" id="pay_under">
									<b>&nbsp;円</b> 
								</div>
              </div>
            </div>
            <div class="form-group row" id="month_pay"><label for="monthly_pay" class="col-sm-3 col-form-label">精算時間&nbsp;<span class="text-danger required">*</span></label>
              <div class="col-sm-7 form-inline">
                <input type="text" class="col-sm-4 form-control" name="monthly_pay_more" id="monthly_pay_more">
                <b>&nbsp;〜&nbsp;</b>
                <input type="text" class="col-sm-4 form-control" name="monthly_pay_under" id="monthly_pay_under">
                <b>&nbsp;時間</b> 
              </div>
            </div>
            <div class="form-group row"><label for="testing_period" class="col-sm-3 col-form-label">想定稼働日数/週&nbsp;<span class="text-danger required">*</span></label>
              <div class="col-sm-9">
                <select name="testing_period" class="form-control" id="testing_period">
                  <option hidden>選択してください</option>
                  <option value=1>週1日</option>
                  <option value=2>週2日</option>
                  <option value=3>週3日</option>
                  <option value=4>週4日</option>
                  <option value=5>週5日</option>
                  <option value=6>応相談</option>
                </select>
              </div>
            </div>
            <div class="form-group row" id="month_pay"><label class="col-sm-3 col-form-label">想定稼働時間/月&nbsp;<span class="text-danger required">*</span></label>
              <div class="col-sm-7 form-inline">
                <input type="text" class="col-sm-4 form-control" name="assumption_upper" id="assumption_upper">
                <b>&nbsp;〜&nbsp;</b>
                <input type="text" class="col-sm-4 form-control" name="assumption_lower" id="assumption_lower">
                <b>&nbsp;時間/月</b> 
              </div>
            </div>
            <div class="form-group row"><label for="welfare_benefits" class="col-sm-3 col-form-label">特記事項&nbsp;<span class="text-danger required">*</span><br>(3000文字以内)</label>
              <div class="col-sm-9"> 
                <textarea class="form-control" name="welfare_benefits" id="welfare_benefits" rows="6"></textarea>
              </div>
            </div>
            <div class="form-group row"><label for="passive_smoking_control" class="col-sm-3 col-form-label">受動喫煙対策&nbsp;<span class="text-danger required">*</span></label>
              <div class="col-sm-9">
                <select name="passive_smoking_control" class="form-control" id="passive_smoking_control">
                  <option hidden>選択してください</option>
                  <option value=1>禁煙</option>
                  <option value=2>喫煙スペースあり</option>
                  <option value=3>なし(喫煙可)</option>
                </select>
              </div>
            </div>
            <div class="form-group row"><label for="passive_smoking_control_ditail" class="col-sm-3 col-form-label">受動喫煙対策（詳細）<br>(1000文字以内)</label>
              <div class="col-sm-9">
                <textarea class="form-control" name="passive_smoking_control_ditail" id="passive_smoking_control_ditail" rows="6">{{ old('passive_smoking_control_ditail') }}</textarea>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<br>

<script>
let rec = @json($rec_info_re);
//試験期間の有無に応じた詳細テキストエリアの表示非表示の切り替え
$(function(){
  $('#testing_period').change(function() {
    let test_part = $(this).val();
    if (test_part == 1 ) {
      $('#test_part_detail').show();
    }else if (test_part == 2) {
      $('#test_part_detail').after().hide();
    }
  });

  if (@json($rec_info_re) != 0) {
    if(rec['trial_period'] == 1){
      $('#test_part_detail').show();
    }else if ($('#testing_period').val() == 2) {
      $('#test_part_detail').after().hide();
    }
  }else{
    $('#test_part_detail').after().hide();
  } 
  
});


</script>
