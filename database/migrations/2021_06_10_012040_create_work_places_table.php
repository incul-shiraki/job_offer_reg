<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkPlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_places', function (Blueprint $table) {
					$table->id();
					$table->unsignedBigInteger('recruit_offer_infos_id')->comment('人材紹介　求人情報ID');
					$table->unsignedBigInteger('outsource_offer_infos_id')->comment('業務委託　求人ID');
					$table->integer('post_number')->comment('郵便番号');
					$table->string('prefecture')->comment('都道府県');
					$table->string('address')->comment('市区町村・番地・建物名');
					$table->string('nearest_station_line')->comment('最寄駅の路線');
					$table->string('nearest_station')->comment('最寄駅');
					$table->string('nearest_station_distance')->comment('最寄駅までの距離');
					$table->string('work_location_detail')->comment('勤務地詳細');
					$table->integer('created_by')->nullable();
					$table->timestamp('created_at')->nullable();
					$table->integer('updated_by')->nullable();
					$table->timestamp('updated_at')->nullable();
					$table->integer('deleted_by')->nullable();
					$table->timestamp('deleted_at')->nullable();

            $table->foreign('recruit_offer_infos_id')->references('id')->on('recruit_offer_infos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_places');
    }
}
