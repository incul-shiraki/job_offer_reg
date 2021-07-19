<!-- job_offer_registrationのパーツ -->
<!-- 勤務地 -->
<div class="row">
  <div class="masonry-item col-md-2 d-none d-lg-block d-xl-block d-md-block col-12">&nbsp;</div>
  <div class="col-md-8 col-12">
    <div class="card">
      <div class="card-header">
        <h3 class='card_title'>勤務地</h3>
      </div>
      <div class="card-body">
        <div class="masonry-item">
          <div class="form-group row"><label for="home_working" class="col-sm-3 col-form-label">在宅勤務</label>
            <div class="col-sm-9">
              <select name="home_working" class="form-control" id="home_working">
                <option value=1>選択しない</option>
                <option value=2>テレワーク(常時)</option>
                <option value=3>一部テレワーク</option>
              </select>
            </div>
          </div>
          <div class="form-group row"><label for="home_working_detail" class="col-sm-3 col-form-label">在宅勤務詳細</label>
            <div class="col-sm-9">
              <textarea class="form-control" name="home_working_detail" id="home_working_detail" rows="6"></textarea>
            </div>
          </div>
          <div class="form-group row" id="input_pluralBox"><label class="col-sm-3 col-form-label">勤務地</label>
            <div class="col-sm-9" id="input_plural">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">勤務地情報追加</button>
              <button type="button" class="btn btn-dark" id="work-location-delete">勤務地情報削除</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<br>
<script>
$(function(){

  if (@json($rec_info_re) != 0) {
    var temp = @json($rec_info_re);
    var work_place = @json($work_place);
    for (var i = 1; i <= work_place.length; i++){
    var workP = work_place[i -1];
    //勤務地の枠を作成
    $('#input_plural').after('<div id="work-location-1" class="col-sm-11 text" style="padding: 10;">\
      <div class="card-header" id="locate00' + i + '"></div>\
      <div class="card-body">\
        <div class="row" style="padding: 10;">\
          <label class="col-sm-4 control-label">郵便番号</label>\
          <label class="col-sm-7 control-label" id="locate01' + i + '"></label>\
        </div>\
        <div class="row" style="padding: 10;">\
          <label class="col-sm-4 control-label">都道府県</label>\
          <label class="col-sm-7 control-label" id="locate02' + i + '"></label>\
        </div>\
        <div class="row" style="padding: 10;">\
          <label class="col-sm-4 control-label">住所（市区町村・番地・建物名）</label>\
          <label class="col-sm-7 control-label" id="locate03' + i + '"></label>\
        </div>\
        <div class="row" style="padding: 10;">\
          <label class="col-sm-4 control-label">最寄駅と路線</label>\
          <label class="col-sm-7 control-label" id="locate04' + i + '"></label>\
        </div>\
        <div class="row" style="padding: 10;">\
          <label class="col-sm-4 control-label">最寄駅までの距離</label>\
          <label class="col-sm-7 control-label" id="locate05' + i + '"></label>\
        </div>\
        <div class="row" style="padding: 10;">\
          <label class="col-sm-4 control-label">勤務地詳細</label>\
          <label class="col-sm-7 control-label" id="locate06' + i + '"></label>\
        </div>\
      </div>\
    </div>');
    
    //値の取得
    document.getElementById('locate01' + i).innerHTML = workP['post_number'];             
    document.getElementById('locate02' + i).innerHTML = workP['prefecture'];              
    document.getElementById('locate03' + i).innerHTML = workP['address'];                 
    document.getElementById('locate04' + i).innerHTML = (workP['nearest_station'] + '：' + workP['nearest_station_line']);    
    document.getElementById('locate05' + i).innerHTML = workP['nearest_station_distance'];
    document.getElementById('locate06' + i).innerHTML = workP['work_location_detail'];    
    var loc_title = '勤務地詳細' + i ;
    document.getElementById('locate00' + i).innerHTML = loc_title; 
    //DBに保存する用
      $('#input_pluralBox').append('<input type="hidden" name="loc01[]" id=loc1' + i + '>');
      $('#input_pluralBox').append('<input type="hidden" name="loc02[]" id=loc2' + i + '>'); 
      $('#input_pluralBox').append('<input type="hidden" name="loc03[]" id=loc3' + i + '>'); 
      $('#input_pluralBox').append('<input type="hidden" name="loc04[]" id=loc4' + i + '>'); 
      $('#input_pluralBox').append('<input type="hidden" name="loc05[]" id=loc5' + i + '>'); 
      $('#input_pluralBox').append('<input type="hidden" name="loc06[]" id=loc6' + i + '>'); 
      $('#input_pluralBox').append('<input type="hidden" name="loc07[]" id=loc7' + i + '>'); 
    //複数レコード格納するために配列に要素を入れる
      $('#loc1' + i).val(workP['post_number']);
      $('#loc2' + i).val(workP['prefecture']);
      $('#loc3' + i).val(workP['address']);
      $('#loc4' + i).val(workP['nearest_station_line']);
      $('#loc5' + i).val(workP['nearest_station']);
      $('#loc6' + i).val(workP['nearest_station_distance']);
      $('#loc7' + i).val(workP['work_location_detail']);
    }
  }

})
</script>
