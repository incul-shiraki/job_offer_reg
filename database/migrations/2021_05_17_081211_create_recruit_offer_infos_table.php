<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecruitOfferInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recruit_offer_infos', function (Blueprint $table) {
            $table->id();
						$table->integer('corporations_id');
						$table->integer('recruit_company_id');
						$table->string('recruit_ocupation');   //企業ID
            $table->integer('open_status');  //公開情報 
            $table->string('job_title');   //求人タイトル
            $table->string('job_feature');   //特徴・訴求ポイント
            $table->string('image_main');   //画像（メイン）
            $table->string('image_sub_1')->nullable();   //画像(サブ１)
            $table->string('image_sub_2')->nullable();   //画像(サブ２)  
            $table->string('image_sub_3')->nullable();   //画像(サブ３)
            $table->string('image_sub_4')->nullable();   //画像(サブ４)
            $table->string('image_sub_5')->nullable();   //画像(サブ５)
            $table->integer('marketing_use')->nullable();   //集客利用の可否
            $table->string('job_requirement');   //必須要件・応募資格
            $table->integer('final_education');   //最終学歴
            $table->integer('applicable_age_from');   //
            $table->integer('applicable_age_to');   //
            $table->integer('company_number');   //
            $table->integer('sex');   //
            $table->integer('inexperienced');   //
            $table->integer('foregin_nationality');   //
            $table->integer('english_level');   //
            $table->integer('chinese_level');   //
						$table->date('recruit_period')->nullable();    //募集期間
            $table->integer('occupation_category_1');   //
            $table->integer('occupation_category_2');   //
            $table->integer('recruiting_plan_count');   //
            $table->integer('PV_count')->nullable();   //
            $table->integer('calculation_method_performance_fee');   //
            $table->integer('Theoretical_annual')->nullable();   //
            $table->string('Theoretical_annual_income')->nullable();   //
            $table->string('fixed_reward')->nullable();   //
            $table->string('refund_policy');   //
            $table->string('warning_text');   //
            $table->string('job_description');   //
            $table->string('job_attraction')->nullable();   //
            $table->string('job_experience')->nullable();   //
            $table->integer('management_supervisor');   //
            $table->string('department')->nullable();   //
            $table->string('department_detail')->nullable();   //
            $table->integer('employment');   //
            $table->string('working_time_type');   //
            $table->string('working_time');   //
            $table->integer('working_hours_system');   //
            $table->integer('deemed_working_hours_system')->nullable();   //
            $table->string('deemed_working_hours')->nullable();   //
            $table->string('overtime_hours')->nullable();   //
            $table->integer('short_working_hours_system');   //
            $table->string('short_working_hours_system_detail')->nullable();   //
            $table->string('selection_flow');   //
            $table->string('selection_detail')->nullable();   //
            $table->integer('telework')->nullable();   //
            $table->string('telework_info')->nullable();   //
            $table->integer('salary_type');   //
            $table->integer('yearly_pay_amount_from')->nullable();   //
            $table->integer('yearly_pay_amount_to')->nullable();   //
            $table->integer('payment_method')->nullable();   //
            $table->integer('monthly_salaly_from')->nullable();   //
            $table->integer('monthly_salaly_to')->nullable();   //
            $table->integer('montyly_pay_assumption_annual_income_from')->nullable();   //
            $table->integer('montyly_pay_assumption_annual_income_to')->nullable();   //
            $table->integer('daily_salary_from')->nullable();   //
            $table->integer('daily_salary_to')->nullable();   //
            $table->integer('hourly_wage_from')->nullable();   //
            $table->integer('hourly_wage_to')->nullable();   //
            $table->string('basic_salary')->nullable();   //
            $table->string('fixed_overtime_fee')->nullable();   //
            $table->string('fixed_overtime_hours')->nullable();   //
            $table->string('payment_for_fixed_overtime')->nullable();   //
            $table->string('salary_treatment_detail')->nullable();   //
            $table->integer('trial_period');
            $table->string('trial_period_deatail')->nullable();   //   //
            $table->string('annual_holiday');   //
            $table->string('holiday_vacation');   //
            $table->string('welfare');   //
            $table->integer('counterplan_secound_hand_smok');   //
            $table->string('counterplan_secound_hand_smok_detail')->nullable();   //
						$table->integer('created_by')->nullable();
						$table->timestamp('created_at')->nullable();
						$table->integer('updated_by')->nullable();
						$table->timestamp('updated_at')->nullable();
						$table->integer('deleted_by')->nullable();
						$table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recruit_offer_infos');
    }
}
