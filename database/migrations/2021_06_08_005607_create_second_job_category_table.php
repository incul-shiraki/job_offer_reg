<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSecondJobCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('second_job_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('first_job_category_id')->comment('業種１ ID');
            $table->string('name')->comment('業種２');
            $table->timestamps();

            $table->foreign('first_job_category_id')->references('id')->on('first_job_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('second_job_categories');
    }
}
