<!-- job_offer_registrationのパーツ -->
<!-- 必須要件 -->
<div class="row">
  <div class="masonry-item col-md-2 d-none d-lg-block d-xl-block d-md-block col-12">&nbsp;</div>
  <div class="col-md-8 col-12">
    <div class="card">
      <div class="card-header">
        <h3 class='card_title'>募集要項</h3>
      </div>
      <div class="card-body">
        <div class="masonry-item">
            <div class="form-group row"><label for="recruiting_plan_count" class="col-sm-3 col-form-label">募集予定人数&nbsp;<span class="text-danger required">*</span></label>
              <div class="col-sm-9">
                <select name="recruiting_plan_count" class="form-control" id="recruiting_plan_count">
                  <option hidden>選択してください</option>
                  <option value=1>1人</option>
                  <option value=2>2人</option>
                  <option value=3>3人</option>
                  <option value=4>4人</option>
                  <option value=5>5〜9人</option>
                  <option value=6>10〜19人</option>
                  <option value=7>20〜29人</option>
                  <option value=8>30人〜</option>
                </select>
              </div>
            </div>
            <div class="form-group row"><label for="division_name" class="col-sm-3 col-form-label">部署名</label>
              <div class="col-sm-9">
                <input type="text" name="division_name" class="form-control" id="division_name" placeholder="">
              </div>
            </div>
            <div class="form-group row"><label for="division_detail" class="col-sm-3 col-form-label">部署詳細</label>
              <div class="col-sm-9"> 
                <textarea class="form-control" name="division_detail" id="division_detail" rows="6"></textarea>
              </div>
            </div>
            <div class="form-group row"><label for="employment_status" class="col-sm-3 col-form-label">雇用形態&nbsp;<span class="text-danger required">*</span></label>
              <div class="col-sm-9">
                <select name="employment_status" class="form-control" id="employment_status">
                  <option hidden>選択してください</option>
                  <option value=1>正社員</option>
                  <option value=2>契約社員</option>
                  <option value=3>パート・アルバイト</option>
                </select>
              </div>
            </div>
            <div class="row"><label for="template" class="col-sm-3 col-form-label"></label>
              <div class="col-sm-7">
                <select name="template" id="template" class="form-control">
                  <option hidden>勤務時間タイプのテンプレート選択</option>
                  <option value=1>固定時間制(一般的な勤務時間)</option>
                  <option value=2>フレックス制(コアタイムあり)</option>
                  <option value=3>フレックス制(コアタイムなし)</option>
                  <option value=4>変形労働時間制(１ヶ月単位)</option>
                  <option value=5>変形労働時間制(１年単位)</option>
                  <option value=6>裁量労働時間制(みなし労働時間制)</option>
                  <!-- <option value=7>その他</option> -->
                </select>
              </div>
            </div>
            <div class="form-group row"><label for="working_hours_type" class="col-sm-3 col-form-label">勤務時間タイプ&nbsp;<span class="text-danger required">*</span></label>
              <div class="col-sm-9"> 
                <textarea class="form-control" name="working_hours_type" id="working_hours_type" rows="6"></textarea>
              </div>
            </div>
            <div class="form-group row"><label for="working_hours" class="col-sm-3 col-form-label">勤務時間&nbsp;<span class="text-danger required">*</span></label>
              <div class="col-sm-9"> 
                <textarea class="form-control" name="working_hours" id="working_hours" rows="6"></textarea>
              </div>
            </div>
            <div class="form-group row"><label for="supervisor_job_offer" class="col-sm-3 col-form-label">管理監督者の求人&nbsp;<span class="text-danger required">*</span></label>
              <div class="col-sm-9">
                <div style="display:block;"><input type="radio" name="supervisor_job_offer" id="supervisor_job_offer1" value=1 {{ old('supervisor_job_offer',1) == 1 ? 'checked' : ''}}><label for="supervisor_job_offer1" class="check_radio_label">管理監督者の募集ではない</label></div>
                <div style="display:block;"><input type="radio" name="supervisor_job_offer" id="supervisor_job_offer2" value=2 {{ old('supervisor_job_offer',1) == 2 ? 'checked' : ''}}><label for="supervisor_job_offer2" class="check_radio_label">管理監督者の募集</label></div>
              </div>
            </div>
            <div class="form-group row" id="hide_menu1"><label for="working_hours_system_fixed_overtime_work_fare" class="col-sm-3 col-form-label">労働時間制・固定残業代&nbsp;<span class="text-danger required">*</span></label>
              <div class="col-sm-9">
                <select name="working_hours_system_fixed_overtime_work_fare" class="form-control hide" id="working_hours_system_fixed_overtime_work_fare">
                  <option value=1>通常(残業代は別途支給)</option>
                  <option value=2>固定残業代制</option>
                  <option value=3>みなし労働時間制</option>
                </select>
              </div>
            </div>
            <div class="form-group row" id="hide_menu2"><label for="deemed_working_hours_system_type" class="col-sm-3 col-form-label">みなし労働時間制の種類&nbsp;<span class="text-danger required">*</span></label>
              <div class="col-sm-9">
                <select name="deemed_working_hours_system_type" class="form-control" id="deemed_working_hours_system_type">
                  <option value=0 hidden>選択してください</option>
                  <option value=1>専門業務型裁量労働制</option>
                  <option value=2>企画業務型裁量労働制</option>
                  <option value=3>社内勤務なし 事業場外みなし労働時間制</option>
                  <option value=4>社内勤務あり 事業場外みなし労働時間制</option>
                </select>
              </div>
            </div>
            <div class="form-group row" id="hide_menu3"><label for="deemed_working_hours_per_one_day" class="col-sm-3 col-form-label">1日あたりのみなし労働時間&nbsp;<span class="text-danger required">*</span></label>
              <div class="col-sm-9"><input type="text" name="deemed_working_hours_per_one_day" class="form-control" id="deemed_working_hours_per_one_day" value="{{ old('deemed_working_hours_per_one_day') }}" 
                placeholder="〇〇時間　もしくは　〇〇分"></div>
            </div>
            <div class="form-group row"><label for="overtime_hours_detail" class="col-sm-3 col-form-label">残業時間の詳細</label>
              <div class="col-sm-9"> 
                <textarea class="form-control" name="overtime_hours_detail" id="overtime_hours_detail" rows="6"></textarea>
              </div>
            </div>
            <div class="form-group row"><label for="shorter_working_hours_working" class="col-sm-3 col-form-label">時短勤務&nbsp;<span class="text-danger required">*</span></label>
              <div class="col-sm-9">
                <div style="display:block;"><input type="radio" name="shorter_working_hours_working" value=1 id="shorter_working_hours_working1" {{ old('shorter_working_hours_working',1) == 1 ? 'checked' : '' }}><label for="shorter_working_hours_working1" class="check_radio_label">不可</label></div>
                <div style="display:block;"><input type="radio" name="shorter_working_hours_working" value=2 id="shorter_working_hours_working2" {{ old('shorter_working_hours_working',1) == 2 ? 'checked' : '' }}><label for="shorter_working_hours_working2" class="check_radio_label">可</label></div>
              </div>
            </div>
            <div class="form-group row" id="short_work"><label for="shorter_working_hours_working_detail" class="col-sm-3 col-form-label">時短勤務詳細</label>
              <div class="col-sm-9"> 
                <textarea class="form-control" name="shorter_working_hours_working_detail" id="shorter_working_hours_working_detail" rows="6"></textarea>
              </div>
            </div>
            <div class="form-group row"><label class="col-sm-3 col-form-label">選考フロー&nbsp;<span class="text-danger required">*</span></label>
              <div class="col-sm-9" class="form-control" id="selection_flow">
              </div>
              <label class="col-sm-3 col-form-label"></label>
                <button type="button" class="btn btn-primary" id='add_flow' style="align:center;">＋選考フロー追加</button>
            </div>
            <div class="form-group row"><label for="selection_detail" class="col-sm-3 col-form-label">選考詳細<br>(1000文字以内)</label>
              <div class="col-sm-9">
                <textarea class="form-control" name="selection_detail" id="selection_detail" rows="6"></textarea>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<br>

<script>

$(function() {
let selectFlow = @json($selection_flows);
let count = 0;
let max_num = (Object.keys(selectFlow).length);

  //基本的な選考フローの追加アクション
  $('#add_flow').click(function() {
    hiddenFlowCreate(count,"");
    selectFormCreate();
  })
  
  //選考フローの１単位を作成するファンクション
  const selectFormCreate = () => {
    $('#selection_flow').append('<div id="select_box_' + count + '" class="form-group row">\
        <select name="select_flow[]" onchange="changeFlowSelect(event)" class="col-sm-7 form-control" id="select_flow_' + count + '" style="display:flex;">\
          <option hidden class="not_select">選択してください</option>\
        </select>\
        <button type="button" onclick="deleteFlow(event)" class="close"><span style="display:flex;" id="' + count + '" aria-hidden="true">×</span></button>\
      </div>');
    for ( var i = 1; i <= max_num; i++ ){
      $('#select_flow_' + count).append('<option  value=' + i + '>' + selectFlow[i] + '</option>');
    }
    //合計数をカウント
    count++;
  }

// 選考フローの変更同期
  window.changeFlowSelect = function changeFlowSelect(event){
    let value = event || window.event;
    let element = value.target || value.srcElement;
    let id = element.id;  
    let hiddenNum = id.substr(-1);
    let change_value = $('#' + id).val();
    $('#select_flow' + hiddenNum).val(change_value);
  }  

// 選考フローの削除
  window.deleteFlow = function deleteFlow(event){
    let value = event || window.event;
    let element = value.target || value.srcElement;
    let id = element.id;  
    $('#select_box_' + id).remove();
    hiddenFlowRemove(id);
  }  

  //DBに登録されている値を使ってフォームを作成
  if (@json($rec_info_re) != 0) {
  //選考フローのチェックをつける
    const flow_str = @json($rec_info_re['selection_flow']);
    let flow_array =flow_str.split(',');
    for ( var i = 0; i < flow_array.length; i++ ){
      selectFormCreate ()
      $('#select_flow_' + i).val(flow_array[i]);
      console.log(i);
      hiddenFlowCreate(i,flow_array[i]);
    }
  }

  //DB登録用のデータを用意
  function hiddenFlowCreate(num,value) {
    $('#input_pluralBox').append('<input type="hidden" name="select_flow[]" id=select_flow' + num + '>'); 
    $('#select_flow' + num).val(value);
  }
  
  //選考フローを削除したときにDB登録用のデータも削除する
    function hiddenFlowRemove(id) {
      $('#select_flow' + id).remove();
    }

})


</script>
