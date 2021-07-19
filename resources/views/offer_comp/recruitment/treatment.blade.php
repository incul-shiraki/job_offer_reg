<!-- job_offer_registrationのパーツ -->
<!-- 必須要件 -->
<div class="row">
  <div class="masonry-item col-md-2 d-none d-lg-block d-xl-block d-md-block col-12">&nbsp;</div>
  <div class="col-md-8 col-12">
    <div class="card">
      <div class="card-header">
        <h3 class='card_title'>給与・待遇・福利厚生</h3>
      </div>
      <div class="card-body">
        <div class="masonry-item">
            <div class="form-group row"><label for="payroll_type" class="col-sm-3 col-form-label">給与タイプ&nbsp;<span class="text-danger required">*</span></label>
              <div class="col-sm-9">
                <div style="display:block;"><input type="radio" name="payroll_type" value=1 class="payroll_type" id="payroll_type1" {{ old('payroll_type',1) == 1 ? 'checked' : '' }}><label for="payroll_type1" class="check_radio_label">年俸</label></div>
                <div style="display:block;"><input type="radio" name="payroll_type" value=2 class="payroll_type" id="payroll_type2" {{ old('payroll_type',1) == 2 ? 'checked' : '' }}><label for="payroll_type2" class="check_radio_label">月給</label></div>
                <div style="display:block;"><input type="radio" name="payroll_type" value=3 class="payroll_type" id="payroll_type3" {{ old('payroll_type',1) == 3 ? 'checked' : '' }}><label for="payroll_type3" class="check_radio_label">日給</label></div>
                <div style="display:block;"><input type="radio" name="payroll_type" value=4 class="payroll_type" id="payroll_type4" {{ old('payroll_type',1) == 4 ? 'checked' : '' }}><label for="payroll_type4" class="check_radio_label">時給</label></div>
              </div>
            </div>
            <div class="form-group row" id="year_pay"><label for="yearly_pay_amount" class="col-sm-3 col-form-label">年俸額&nbsp;<span class="text-danger required">*</span></label>
              <div class="col-sm-7 form-inline">
                <input type="text" class="col-sm-4 form-control" name="yearly_pay_amount_more" id="yearly_pay_amount_more">
                <b>&nbsp;〜&nbsp;</b>
                <input type="text" class="col-sm-4 form-control" name="yearly_pay_amount_under" id="yearly_pay_amount_under">
                <b>&nbsp;円</b> 
              </div>
            </div>
            <div class="form-group row" id="year_pay_method"><label for="payment_methods" class="col-sm-3 col-form-label">支払い方法&nbsp;<span class="text-danger required">*</span></label>
              <div class="col-sm-9">
                <div style="display:block;"><input type="radio" name="year_pay_method" value=1 id="year_pay_method1" {{ old('year_pay_method',1) == 1 ? 'checked' : '' }}><label for="year_pay_method1" class="check_radio_label">年俸の1/12を毎月支給</label></div>
                <div style="display:block;"><input type="radio" name="year_pay_method" value=2 id="year_pay_method2" {{ old('year_pay_method',1) == 2 ? 'checked' : '' }}><label for="year_pay_method2" class="check_radio_label">その他(給与・待遇の詳細に記載)</label></div>
              </div>
            </div>
            <div class="form-group row" id="month_pay"><label for="monthly_pay" class="col-sm-3 col-form-label">月給&nbsp;<span class="text-danger required">*</span></label>
              <div class="col-sm-7 form-inline">
                <input type="text" class="col-sm-4 form-control" name="monthly_pay_more" id="monthly_pay_more">
                <b>&nbsp;〜&nbsp;</b>
                <input type="text" class="col-sm-4 form-control" name="monthly_pay_under" id="monthly_pay_under">
                <b>&nbsp;円</b> 
              </div>
            </div>
            <div class="form-group row" id="12month_pay"><label for="assumption_annual_income" class="col-sm-3 col-form-label">想定年収（万円）&nbsp;<span class="text-danger required">*</span></label>
              <div class="col-sm-7 form-inline">
                <input type="text" class="col-sm-4 form-control" name="assumption_annual_income_more" id="assumption_annual_income_more">
                <b>&nbsp;〜&nbsp;</b>
                <input type="text" class="col-sm-4 form-control" name="assumption_annual_income_under" id="assumption_annual_income_under">
                <b>&nbsp;万円</b> 
              </div>
            </div>
            <div class="form-group row" id="day_pay"><label for="daily_pay" class="col-sm-3 col-form-label">日給&nbsp;<span class="text-danger required">*</span></label>
              <div class="col-sm-7 form-inline">
                <input type="text" class="col-sm-4 form-control" name="dayly_wage_more" id="dayly_wage_more">
                <b>&nbsp;〜&nbsp;</b>
                <input type="text" class="col-sm-4 form-control" name="dayly_wage_under" id="dayly_wage_under">
                <b>&nbsp;円</b> 
              </div>
            </div>
            <div class="form-group row" id="time_pay"><label for="hourly_wage" class="col-sm-3 col-form-label">時給&nbsp;<span class="text-danger required">*</span></label>
              <div class="col-sm-7 form-inline">
                <input type="text" class="col-sm-4 form-control" name="hourly_wage_more" id="hourly_wage_more">
                <b>&nbsp;〜&nbsp;</b>
                <input type="text" class="col-sm-4 form-control" name="hourly_wage_under" id="hourly_wage_under">
                <b>&nbsp;円</b> 
              </div>
            </div>
            <div class="form-group row" id="hide_menu4"><label for="base_salary_amount" class="col-sm-3 col-form-label">基本給の金額&nbsp;<span class="text-danger required">*</span></label>
              <div class="col-sm-9">
                <input type="text" name="base_salary_amount" class="form-control" id="base_salary_amount" placeholder="">
              </div>
            </div>
            <div class="form-group row" id="hide_menu5"><label for="fixed_overtime_work_fee_amount" class="col-sm-3 col-form-label">固定残業代の金額&nbsp;<span class="text-danger required">*</span></label>
              <div class="col-sm-9">
                <input type="text" name="fixed_overtime_work_fee_amount" class="form-control" id="fixed_overtime_work_fee_amount" placeholder="">
              </div>
            </div>
            <div class="form-group row" id="hide_menu6"><label for="fixed_overtime_work_time" class="col-sm-3 col-form-label">固定残業時間&nbsp;<span class="text-danger required">*</span></label>
              <div class="col-sm-9">
                <input type="text" name="fixed_overtime_work_time" class="form-control" id="fixed_overtime_work_time" placeholder="">
              </div>
            </div>
            <div class="form-group row" id="hide_menu7"><label for="fixed_overtime_hours_excess_part_pay" class="col-sm-3 col-form-label">固定残業時間超過分の支給&nbsp;<span class="text-danger required">*</span></label>
              <div class="col-sm-9">
                <input type="text" name="fixed_overtime_hours_excess_part_pay" class="form-control" id="fixed_overtime_hours_excess_part_pay" placeholder="">
              </div>
            </div>
            <div class="form-group row"><label for="payroll_treatment_detail" class="col-sm-3 col-form-label">給与待遇の詳細<br>(1000文字以内)</label>
              <div class="col-sm-9"> 
                <textarea class="form-control" name="payroll_treatment_detail" id="payroll_treatment_detail" rows="6"></textarea>
              </div>
            </div>
            <div class="form-group row"><label for="testing_period" class="col-sm-3 col-form-label">試験期間&nbsp;<span class="text-danger required">*</span></label>
              <div class="col-sm-9">
                <select name="testing_period" class="form-control" id="testing_period">
                  <option hidden>選択してください</option>
                  <option value=1>あり</option>
                  <option value=2>なし</option>
                </select>
              </div>
            </div>
            <div class="form-group row" id="test_part_detail"><label for="testing_period_detail" class="col-sm-3 col-form-label">試験期間詳細<br>(1000文字以内)</label>
              <div class="col-sm-9"> 
                <textarea class="form-control" name="testing_period_detail" id="testing_period_detail" rows="6"></textarea>
              </div>
            </div>
            <div class="form-group row"><label for="annual_holiday" class="col-sm-3 col-form-label">年間休日&nbsp;<span class="text-danger required">*</span></label>
              <div class="col-sm-9">
                <input type="text" name="annual_holiday" class="form-control" id="annual_holiday" placeholder="">
              </div>
            </div>
            <div class="form-group row"><label for="holiday_leave" class="col-sm-3 col-form-label">休日・休暇&nbsp;<span class="text-danger required">*</span><br>(1000文字以内)</label>
              <div class="col-sm-9">
                <textarea class="form-control" name="holiday_leave" id="holiday_leave" rows="6"></textarea>
              </div>
            </div>
            <div class="form-group row"><label for="welfare_benefits" class="col-sm-3 col-form-label">福利厚生&nbsp;<span class="text-danger required">*</span><br>(1000文字以内)</label>
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

