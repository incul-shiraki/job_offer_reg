<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutsourceOfferInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outsource_offer_infos', function (Blueprint $table) {
            $table->id();    //ID
            $table->integer('company_id');  //会社ID
            $table->integer('recruiting_company_id');  //募集企業ID
            $table->integer('outsource_offer_info_id')->nullable();  //公開情報 
            $table->string('recruit_occupation');   //企業ID
            $table->integer('open_status');  //公開情報 
            $table->string('job_title');   //求人タトル
            $table->string('image_main');   //画像（メイン）
            $table->string('image_sub_1')->nullable();   //画像(サブ１)
            $table->string('image_sub_2')->nullable();   //画像(サブ２)  
            $table->string('image_sub_3')->nullable();   //画像(サブ３)
            $table->string('image_sub_4')->nullable();   //画像(サブ４)
            $table->string('image_sub_5')->nullable();   //画像(サブ５)
            $table->integer('marketing_use')->nullable();   //集客利用の可否
            $table->date('recruit_period');    //募集期間
            $table->integer('occupation_category_1');   //職種カテゴリー1
            $table->integer('occupation_category_2');   //職種カテゴリー2
            $table->string('requirements_skills_langages');    //必須要件・スキル（言語）
            $table->string('requirements_skills_framework');   //必須要件・スキル（フレームワーク）
            $table->string('requirements_skills_tool');   //必須要件・スキル（ツール）
            $table->string('requirements_skills_detail');   //必須要件・スキル詳細
            $table->string('welcome_skills_langages')->nullable();   //歓迎スキル（言語）
            $table->string('welcome_skills_framework')->nullable();   //歓迎スキル（フレームワーク）
            $table->string('welcome_skills_tool')->nullable();   //歓迎スキル（ツール）
            $table->string('welcome_skills_detail')->nullable();   //歓迎スキル詳細
            $table->string('phase')->nullable();   //担当工程
            $table->integer('apply_age_from');   //応募可能年齢_開始
            $table->integer('apply_age_to');   //応募可能年齢_終了
            $table->integer('sex');   //性別
            $table->integer('foreign_nationality');   //外国籍の可否
            $table->integer('english_level');   //英語レベル
            $table->integer('unit_price');   //単価
            $table->integer('unit_price_start');   //単価_開始金額
            $table->integer('unit_price_end');   //単価_終了金額
            $table->integer('pay_off_start');   //精算_開始金額
            $table->integer('pay_off_end');   //精算_終了金額
            $table->integer('estimated_working_days_week');   //想定稼働日数/週
            $table->integer('estimated_uptime_month_start');   //想定稼働時間/月_開始
            $table->integer('estimated_uptime_month_end');   //想定稼働時間/月_終了
            $table->integer('telework');   //常駐・リモート
            $table->string('telework_info')->nullable();   //リモートワーク詳細
            $table->integer('counterplan_second_hand_smok');   //受動喫煙対策
            $table->string('counterplan_second_hand_smok_detail')->nullable();   //受動喫煙対策（詳細）
            $table->string('special_notes')->nullable();   //特記事項(その他条件)
            $table->string('proposition');   //案件内容
            $table->string('recruit_background')->nullable();   //募集背景
            $table->integer('team_size')->nullable();   //チーム規模
            $table->integer('recruiting_plan_count');   //募集予定人数
            $table->integer('pv_count')->nullable();   //PVカウント
            $table->string('selection_flow');   //選考フロー
            $table->string('selection_detail')->nullable();   //選考詳細
            $table->date('interview_method')->nullable();   //面談方法
            $table->integer('public_at')->nullable();   //求人公開用編集日時
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
        Schema::dropIfExists('outsource_offer_infos');
    }
}
