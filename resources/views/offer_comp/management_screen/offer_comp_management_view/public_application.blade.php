<!--公開申請ポップアップ -->
              <form action="{{url('/open_offer_mail',$rec_info_re->id)}}" method="post"> 
                {{ csrf_field() }}
                <div class="modal fade" id="Modal_offer_open" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content col-sm-12">
                      <div class="modal-header">
                        <h5 class="modal-title" id="Modal_comp_Label">求人公開申請</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                      </div>
                      <div class="modal-body">
                        <div class-'list-group'>
                          <div class="list-group-item list-group-item-action actived">
                            <div class="form-group row">
                              <label class="col-sm-4 col-form-label">求人タイトル&nbsp;</label>
                              <div class="col-sm-8">
                                <label id="job_title"></label>
                              </div>
                            </div>
                          </div>
                          <div class="list-group-item list-group-item-action actived">
                            <div class="form-group row">
                              <label class="col-sm-4 col-form-label">職種&nbsp;</label>
                              <div class="col-sm-8">
                                <label id="recruit_ocupation"></label>
                              </div>
                            </div>
                          </div>
                        </div>
                      <br>
                        <div class="list-group-item list-group-item-action actived" id="add_list_group">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">成功報酬支払い方法&nbsp;</label>
                            <div class="col-sm-8">
                              <label id="calculation_method_performance_fee" class="col-sm-8 form-control-plaintext"></label>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item list-group-item-action actived">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">返金規約&nbsp;</label>
                            <div class="col-sm-8">
                              <label id="refund_policy" class="form-control-plaintext"></label>
                            </div>
                          </div>
                        </div>
                      <br>
                        <div class="alert alert-warning" role="alert" id="alert_text" style='color: black;'> </div>
                      <br>
                        <div class="col text-center">
                          <label style="padding: .18rem .18rem;" class="text-align"><input type="checkbox" id="check_text_ok" name="check_text_ok" value=1>&nbsp;上記内容を確認しました。</label>
                        </div>
                      </div>
                        <div class="modal-footer mx-auto">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button> 
                          <button type="button" id="offer_req" onclick="submit();"  class="btn btn-primary" data-dismiss="modal">公開申請</button>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="masonry-item col-md-2 d-none d-lg-block d-xl-block d-md-block col-12">&nbsp;</div>
        </form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>

$(function(){
  var rec_info = @json($rec_info_re);
  console.log(rec_info);
  document.getElementById('job_title').innerHTML = rec_info['job_title']
  document.getElementById('recruit_ocupation').innerHTML = rec_info['recruit_ocupation'];
    var flg_successful_reword = (rec_info['calculation_method_performance_fee'] == 1 ) ? '割合(%)' : '固定報酬' ;
  document.getElementById('calculation_method_performance_fee').innerHTML = flg_successful_reword; 
  document.getElementById('refund_policy').innerHTML = rec_info['refund_policy'];
  
  var case_1 = {
              "理想年収の定義": rec_info['Theoretical_annual_income'],
              "割合(%)": rec_info['Theoretical_annual']
              };
  var case_2 = {
              "固定報酬": rec_info['fixed_reward'],
              };
  if (rec_info['calculation_method_performance_fee'] == 1) {
    $.each( case_1, function( key, value ) {
      $('#add_list_group').after('<div class="list-group-item list-group-item-action actived">\
      <div class="form-group row">\
      <label class="col-sm-4 col-form-label">' + key + '</label>\
      <div class="col-sm-8">\
      <label id="Theoretical_annual" class="form-control-plaintext">' + value + '</label>\
      </div>\
      </div>\
      </div>');
    });
  }else if(rec_info['calculation_method_performance_fee'] == 2) {
    $.each( case_2, function( key, value ) {
      $('#add_list_group').after('<div class="list-group-item list-group-item-action actived">\
      <div class="form-group row">\
      <label class="col-sm-4 col-form-label">' + key + '</label>\
      <div class="col-sm-8">\
      <label id="Theoretical_annual" class="form-control-plaintext">' + value + '</label>\
      </div>\
      </div>\
      </div>');
    });
  }
  
  var alert_text = ` 
  報酬を変更する場合は、こちらの公開申請をキャンセルして「成功報酬額の変更申請ボタン」から申請をお願い致します。
  上記の成功報酬以外に、採用（入社）時には採用事務手数料が発生いたします。
  　採用事務手数料　成功報酬額の20%（上限15万円）
  `;
  document.getElementById('alert_text').innerHTML = alert_text;

//チェックボックスの入力に応じて申請ボタンのdisableプロパティの値を更新する
  $('#offer_req').prop('disabled', true);
  $('#check_text_ok').change(function(){
    if ($('input[name="check_text_ok"]').prop('checked')) {
      console.log(1);
      $('#offer_req').prop('disabled', false);
    }else{
      console.log(2);
      $('#offer_req').prop('disabled', true);
    };
  });


  $('#offer_req').click( function() {
    var now = new Date();
    var y = now.getFullYear();
    var m = now.getMonth() + 1;
    var d = now.getDate();
    var w = now.getDay();
    var wd = ['日', '月', '火', '水', '木', '金', '土'];
    var h = now.getHours();
    var mi = now.getMinutes();
    var s = now.getSeconds();
    target = y + '年' + m + '月' + d + '日' + h + '時' + mi + '分' + s + '秒' + '(' + wd[w] + ')';
    alert("クリックされました" + target);
  });

})
</script>
