<!-- lead_offer_detailのパーツ -->
<!--公開申請ポップアップ -->
<form action="{{url('/lead_offer_detail',$rec_info_re->id)}}" method="post"> 
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
                <label class="col-sm-4 col-form-label">報酬単価&nbsp;</label>
                <div class="col-sm-8">
                  <label id="recruit_ocupation"></label>
                </div>
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
  <div class="masonry-item col-md-2 d-none d-lg-block d-xl-block d-md-block col-12">&nbsp;</div>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>

$(function(){
  var rec_info = @json($rec_info_re);
  console.log(rec_info);
  document.getElementById('job_title').innerHTML = rec_info['job_title']
  document.getElementById('recruit_ocupation').innerHTML = rec_info['recruit_ocupation'];
  
  var alert_text = ` 
  参画後の報酬単価は、当社へお支払いいただき、当社から業務委託/SES企業様へお
  支払いする流れとなります。(参画が終了するまでこの流れが継続します)
  ※
  参画者への報酬単価以外に当社手数料及び採用報酬などが発生することではございません。
  募集から採用まで無料でご利用いただけます。
  `;
  document.getElementById('alert_text').innerHTML = alert_text;
  $('#alert_text').each(function(){
  var txt = $(this).text();
  $('#alert_text').html(txt.replace(/※/g, '<br><br><span style="color:red">※業務委託\/SES企業様との直接契約は規約違反となり、罰則の対象となりますのでご注意ください。</span><br><br>'));
  })

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

})
</script>
