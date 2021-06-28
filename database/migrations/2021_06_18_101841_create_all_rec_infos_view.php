<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllRecInfosView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    DB::statement( "CREATE VIEW all_rec_infos AS 
      SELECT 
        corp.id as master_id,
        rec.id as id,
        rec_comp.id as rec_comp_id,
        rec_comp.corporation_name as corp_name,
        rec_comp.prefecture as prefecture,
        rec_comp.address as address,
        rec_comp.industry1,
        rec_comp.industry2,
        rec_comp.employee_number,
        rec_comp.establish_year,
        rec_comp.establish_month,
        rec_comp.company_profile,
        rec_comp.business_content,
        rec_comp.home_page,
        rec_comp.corporation_logo as logo,
        rec.recruit_ocupation,
        rec.open_status,
        rec.job_title,
        rec.job_feature,
        rec.image_main,
        rec.image_sub_1,
        rec.image_sub_2,
        rec.image_sub_3,
        rec.image_sub_4,
        rec.image_sub_5,
        rec.marketing_use,
        rec.job_requirement,
        rec.final_education,
        rec.applicable_age_from,
        rec.applicable_age_to,
        rec.company_number,
        rec.sex,
        rec.inexperienced,
        rec.foregin_nationality,
        rec.english_level,
        rec.chinese_level,
        rec.recruit_period,
        rec.occupation_category_1,
        rec.occupation_category_2,
        rec.recruiting_plan_count,
        rec.PV_count,
        rec.calculation_method_performance_fee,
        rec.Theoretical_annual,
        rec.Theoretical_annual_income,
        rec.fixed_reward,
        rec.refund_policy,
        rec.warning_text,
        rec.job_description,
        rec.job_attraction,
        rec.job_experience,
        rec.management_supervisor,
        rec.department,
        rec.department_detail,
        rec.employment,
        rec.working_time_type,
        rec.working_time,
        rec.working_hours_system,
        rec.deemed_working_hours_system,
        rec.deemed_working_hours,
        rec.overtime_hours,
        rec.short_working_hours_system,
        rec.short_working_hours_system_detail,
        rec.selection_flow,
        rec.selection_detail,
        rec.telework,
        rec.telework_info,
        rec.salary_type,
        rec.yearly_pay_amount_from,
        rec.yearly_pay_amount_to,
        rec.payment_method,
        rec.monthly_salaly_from,
        rec.monthly_salaly_to,
        rec.montyly_pay_assumption_annual_income_from,
        rec.montyly_pay_assumption_annual_income_to,
        rec.daily_salary_from,
        rec.daily_salary_to,
        rec.hourly_wage_from,
        rec.hourly_wage_to,
        rec.basic_salary,
        rec.fixed_overtime_fee,
        rec.fixed_overtime_hours,
        rec.payment_for_fixed_overtime,
        rec.salary_treatment_detail,
        rec.trial_period,
        rec.trial_period_deatail,
        rec.annual_holiday,
        rec.holiday_vacation,
        rec.welfare,
        rec.counterplan_secound_hand_smok,
        rec.counterplan_secound_hand_smok_detail

      FROM recruit_offer_infos rec
      INNER JOIN corporations corp
      ON (rec.corporations_id = corp.id)
      INNER JOIN recruit_companies rec_comp
      ON (rec.recruit_company_id = rec_comp.id)
    ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('all_rec_infos');
    }
}
