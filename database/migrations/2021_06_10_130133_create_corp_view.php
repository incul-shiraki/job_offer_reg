<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorpView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    DB::statement( "CREATE VIEW v_corps AS 
      SELECT 
        corp.id as code,
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
        corp.home_page
      FROM corporations corp
    ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('v_corp');
    }
}
