<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecruitCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recruit_companies', function (Blueprint $table) {
            $table->id();
          $table->unsignedBigInteger('corporations_id')->comment('求人企業ID');
          $table->string('corporation_name')->comment('会社名');
          $table->integer('prefecture')->comment('都道府県');
          $table->string('address')->comment('市区町村・番地・建物名');
          $table->string('home_page')->comment('会社HP');
          $table->integer('industry1')->comment('業界１');
          $table->integer('industry2')->comment('業界２');
          $table->integer('employee_number')->comment('従業員数');
          $table->integer('establish_year')->comment('設立年');
          $table->integer('establish_month')->comment('設立月');
          $table->string('company_profile')->comment('会社概要');
          $table->string('business_content')->comment('事業内容');
          $table->string('corporation_logo')->comment('会社ロゴ');
          $table->integer('created_by')->nullable();
          $table->timestamp('created_at')->nullable();
          $table->integer('updated_by')->nullable();
          $table->timestamp('updated_at')->nullable();
          $table->integer('deleted_by')->nullable();
          $table->timestamp('deleted_at')->nullable();
            $table->foreign('corporations_id')->references('id')->on('corporations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recruit_companies');
    }
}
