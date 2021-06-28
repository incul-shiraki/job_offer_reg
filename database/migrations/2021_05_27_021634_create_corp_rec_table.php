<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorpRecTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    DB::statement( "CREATE VIEW corp_rec AS 
      SELECT 
        corp.id as code,
        rec.id as id,
        corp.corporation_name as corp_name,
        corp.corporation_logo as logo,
        corp.prefecture as prefecture,
        corp.address as address,
        corp.industry1,
        corp.industry2,
        corp.employee_number,
        corp.establish_year,
        corp.establish_month,
        corp.company_profile,
        corp.business_content,
        corp.billing_email_1,
        corp.billing_email_2,
        corp.email,
        corp.tel,
        corp.home_page,
        corp.anual_recuit_number,
        corp.mailing_setting,
        corp.consideration_status,
        corp.inquiry,
        corp.pricacy_terms_approval,
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

      FROM corporations corp
      INNER JOIN recruit_offer_infos rec
      ON (corp.id = rec.corporations_id)
    ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('corp_rec');
    }
}


