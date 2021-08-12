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
          <div class="form-group row"><label class="col-sm-3 col-form-label">選考フロー&nbsp;<span class="text-danger required">*</span></label>
            <div class="col-sm-9" class="form-control" id="selection_flow">
            </div>
            <label class="col-sm-3 col-form-label"></label>
            <button type="button" class="btn btn-primary" id='add_flow' style="align:center;">＋選考フロー追加</button>
          </div>
          <div class="form-group row"><label for="interview_method" class="col-sm-3 col-form-label">面談方法</label>
            <div class="col-sm-9">
              <select name="interview_method" class="form-control" id="interview_method">
                <option hidden>選択してください</option>
                <option value=1>対面のみ</option>
                <option value=2>オンライン面談可</option>
              </select>
            </div>
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
