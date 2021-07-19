<!-- job_offer_registrationのパーツ -->
<!-- 勤務地の詳細情報入力モーダル -->
<div class="mT-30">
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">勤務地情報入力</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body">
          <div class="form-group row"><label for="zip01" class="col-sm-3 col-form-label">郵便番号</label>
            <div class="col-sm-9">
              <input type="text" name="zip01" size="10" maxlength="8" id="zip01" class="form-control" onKeyUp="AjaxZip3.zip2addr(this,'','pref01','addr01');" placeholder="〇〇〇〇〇〇〇">
              <p style="font-size:0.5rem;">※郵便番号はハイフン抜きの半角英数７桁で入力<p>
            </div>
          </div>

          <div class="form-group row"><label for="pref01" class="col-sm-3 col-form-label">都道府県&nbsp;<span class="text-danger required">*</span></label>
            <div class="col-sm-9">
              <input type="text" name="pref01" class="form-control" id="pref01" placeholder="〇〇県">
            </div>
          </div>

          <div class="form-group row"><label for="addr01" class="col-sm-3 col-form-label">住所（市区町村・番地・建物名）</label>
            <div class="col-sm-9">
              <input type="text" name="addr01" class="form-control" id="addr01" placeholder="〇〇市〇〇１−２−３　建物名">
            </div>
          </div>

<!-- test_area -->
          <div class="form-group row"><label for="addr01" class="col-sm-3 col-form-label">駅名</label>
            <div class="col-sm-9">
              <input type="text" name="keyword" class="form-control" id="keyword">
            </div>
          </div>

          <div class="form-group row"><label for="station_route" class="col-sm-3 col-form-label">最寄駅と路線&nbsp;<span class="text-danger required">*</span></label>
            <div class="col-sm-9" style='display:flex;'>
              <select name="station_route" class="form-control col-sm-8" id="station_route"></select>&nbsp;
              <button type="button" id="set_station_route" class="form-control btn btn-primary">決定</button>
            </div>
          </div>
          <div class="form-group row"><label class="col-sm-3 col-form-label">駅名：路線リスト</label>
            <div class="col-sm-9" id="station_route_list">
            </div>
          </div>
<!-- test_area -->

          <div class="form-group row"><label for="range_up_to_closest_station" class="col-sm-3 col-form-label">最寄駅までの距離</label>
            <div class="col-sm-9">
              <input type="text" name="range_up_to_closest_station" class="form-control" id="range_up_to_closest_station" placeholder="徒歩◯分"></div>
          </div>

          <div class="form-group row"><label for="working_place_detail" class="col-sm-3 col-form-label">勤務地詳細</label>
            <div class="col-sm-9"> <textarea class="form-control" name="working_place_detail" id="working_place_detail" rows="6">{{ old('working_place_detail') }}</textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button> 
          <button type="button" id="modal_reg" class="btn btn-primary" data-dismiss="modal">勤務地登録</button>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(function() {

// 最寄駅と路線検索
  $('#keyword').keyup(function(){
    $('#station_route').html("");
    var pref = $('#pref01').val();
    var keyword = $('#keyword').val();
    var station_route = 'https://express.heartrails.com/api/json?method=getStations&name=' + keyword
    $.ajax({
    url: station_route,
    type:'GET',
    dataType: 'json', 
    timeout:5000,
    success: function(data, dataType) {
        data.response.station.forEach(function( value ) {
          $('#station_route').append('<option>' + value['name'] +  '駅：' + value['line'] +'</option>');
        });
      },
    error: function(XMLHttpRequest, textStatus, errorThrown) {
        alert("路線情報が取得できませんでした。");
        console.log("路線情報が取得できませんでした。", XMLHttpRequest, textStatus, errorThrown);
      }
    });
  })

// 最寄路線と駅の設定
  $('#set_station_route').click(function(){
    temp_location = $('#station_route').val();

    create_station_route(temp_location);
  })
  
// 最寄路線と駅の作成
    var code = 0;
  function create_station_route(temp_location){
    // console.log(route_temp);
    code++;
    $('#station_route_list').append('<div id="station_route_no_' + code + '"><label class="col-sm-2 col-form-label"></label>\
      <button type="button" onclick="delete_station_route(event)" id="close_station_route_' + code +'" class="close"><span id="' + code + '" aria-hidden="true">×</span></button>\
      <label id="station_route_' + code + '" class="col-sm-6 col-form-label">' + temp_location + '</label>\
    </div>'); 
  }
// 最寄路線の削除
  window.delete_station_route = function delete_station_route(event){
    var value = event || window.event;
    var element = value.target || value.srcElement;
    var id = element.id;  
    $('#station_route_no_' + id).remove();

  }

  function save_satation_route(){
    var temp_loc_array = [];
    for (var i = 1; i <= code; i++){
      temp_loc_array.push($('#station_route_' + i).html());
    }
    return temp_loc_array.join('<br>');
  }

  function save_route(){
    var temp_loc_array = [];
    var temp_route;
    for (var i = 1; i <= code; i++){
      console.log()
      temp_route = $('#station_route_' + i).html().split('：');
      temp_loc_array.push(temp_route[1]);
    }
    return temp_loc_array;
  }

  function save_station(){
    var temp_loc_array = [];
    var temp_station;
    for (var i = 1; i <= code; i++){
      temp_station = $('#station_route_' + i).html().split('：');
      temp_loc_array.push(temp_station[0]);
    }
    return temp_loc_array;
  }

// 勤務地情報の追加
    var idd = $('#work-location-1').find('div');
    var temp_str = (idd.length == 0) ? 0 : idd[0].id;
    var counter = String(temp_str).substr(-1,1);
  $('#modal_reg').click(function(){
    counter++;
    var loc_title = '勤務地詳細' + counter;
    $('#input_plural').after('<div id="work-location-1" class="col-sm-11 text" style="padding: 10;">\
      <div class="card-header" id="locate00' + counter + '"></div>\
      <div class="card-body">\
        <div class="row" style="padding: 10;">\
          <label class="col-sm-4 control-label">郵便番号</label>\
          <label class="col-sm-4 control-label" id="locate01"></label>\
        </div>\
        <div class="row" style="padding: 10;">\
          <label class="col-sm-4 control-label">都道府県</label>\
          <label class="col-sm-4 control-label" id="locate02"></label>\
        </div>\
        <div class="row" style="padding: 10;">\
          <label class="col-sm-4 control-label">住所（市区町村・番地・建物名）</label>\
          <label class="col-sm-7 control-label" id="locate03"></label>\
        </div>\
        <div class="row" id="app01" style="padding: 10;">\
          <label class="col-sm-4 control-label">最寄駅と路線</label>\
          <label class="col-sm-7 control-label" id="locate04"></label>\
        </div>\
        <div class="row" style="padding: 10;">\
          <label class="col-sm-4 control-label">最寄駅までの距離</label>\
          <label class="col-sm-7 control-label" id="locate05"></label>\
        </div>\
        <div class="row" style="padding: 10;">\
          <label class="col-sm-4 control-label">勤務地詳細</label>\
          <label class="col-sm-7 control-label" id="locate06"></label>\
        </div>\
      </div>\
    </div>');
    //画面に表示用

    document.getElementById('locate01').innerHTML = $('#zip01').val();
    document.getElementById('locate02').innerHTML = $('#pref01').val();
    document.getElementById('locate03').innerHTML = $('#addr01').val();
    document.getElementById('locate04').innerHTML = save_satation_route();
    document.getElementById('locate05').innerHTML = $('#range_up_to_closest_station').val();
    document.getElementById('locate06').innerHTML = $('#working_place_detail').val();
    document.getElementById('locate00' + counter).innerHTML = loc_title; 
    //DBに保存する用
      $('#input_pluralBox').append('<input type="hidden" name="loc01[]" id=loc01' + counter + '>');
      $('#input_pluralBox').append('<input type="hidden" name="loc02[]" id=loc02' + counter + '>'); 
      $('#input_pluralBox').append('<input type="hidden" name="loc03[]" id=loc03' + counter + '>'); 
      $('#input_pluralBox').append('<input type="hidden" name="loc04[]" id=loc04' + counter + '>'); 
      $('#input_pluralBox').append('<input type="hidden" name="loc05[]" id=loc05' + counter + '>'); 
      $('#input_pluralBox').append('<input type="hidden" name="loc06[]" id=loc06' + counter + '>'); 
      $('#input_pluralBox').append('<input type="hidden" name="loc07[]" id=loc07' + counter + '>'); 
    //複数レコード格納するために配列に要素を入れる
      $('#loc01' + counter).val($('#zip01').val());
      $('#loc02' + counter).val($('#pref01').val());
      $('#loc03' + counter).val($('#addr01').val());
      $('#loc04' + counter).val(save_route());
      $('#loc05' + counter).val(save_station());
      $('#loc06' + counter).val($('#range_up_to_closest_station').val());
      $('#loc07' + counter).val($('#working_place_detail').val());
      code = 0;

      //初期化
      $('#zip01').val("");
      $('#pref01').val("");
      $('#addr01').val("");
      $('#keyword').val("");
      $('#range_up_to_closest_station').val("");
      $('#working_place_detail').val("");
      $('#station_route').empty();
      $('#station_route_list').empty();
  })

// 勤務地情報の項目削除
  $('#work-location-delete').click(function(){
    if (counter > 0) {
      counter--;
    }
    $('#work-location-1').remove();
  })
})
</script>
