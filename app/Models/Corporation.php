<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//add20210607
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Corporation extends Model
{
    // Accessor
    public function getPrefectureAttribute() {

        $id = $this->prefecture_id;
        $prefectures = config('constants.prefectures');
        return $prefectures[$id] ?? '';

    }

}
