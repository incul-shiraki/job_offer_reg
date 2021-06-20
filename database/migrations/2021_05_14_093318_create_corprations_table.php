<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorprationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corporations', function (Blueprint $table) {
            $table->id();
					$table->string('corporation_name');
					$table->string('corporation_logo');
					$table->integer('prefecture');
					$table->string('address');
					$table->integer('industry1');
					$table->integer('industry2');
					$table->integer('employee_number');
					$table->integer('establish_year')->nullable();
					$table->integer('establish_month')->nullable();
					$table->string('company_profile');
					$table->string('business_content');
					$table->string('billing_email_1')->nullable();
					$table->string('billing_email_2')->nullable();
					$table->string('email')->nullable();
					$table->string('tel')->nullable();
					$table->string('home_page');
					$table->integer('anual_recuit_number')->nullable();
					$table->integer('mailing_setting')->nullable();
					$table->integer('consideration_status')->nullable();
					$table->string('inquiry')->nullable();
					$table->integer('pricacy_terms_approval')->nullable();
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
        Schema::dropIfExists('corporations');
    }
}
