<!-- job_offer_registrationのパーツ -->
<!-- 新規募集企業登録 -->
<div class="row update_page">
  <div class="masonry-item col-md-2 d-none d-lg-block d-xl-block d-md-block col-12">&nbsp;</div>
  <div class="col-md-8 col-12">
    <div class="alert alert-danger" role="alert">
      <h2>エージェント限定情報を編集は運営までご連絡下さい</h2>
      <a href="#">運営へのお問い合わせはこちらへ</a>
    </div>
  </div>
</div>
  
<div class="row update_page">
  <div class="masonry-item col-md-2 d-none d-lg-block d-xl-block d-md-block col-12">&nbsp;</div>
  <div class="col-md-8 col-12">
    <div class="card">
      <div class="card-header">
        <h3 class='card_title'>エージェント限定情報</h3>
      </div>
      <div class="card-body">
        <div class="masonry-item">
          <div class="form-group row"><label for="successful_reward_calculation_method" class="col-sm-3 col-form-label">成功報酬の算定方法&nbsp;<span class="text-danger required">*</span></label>
            <div class="col-sm-9">
              <label name="successful_reward_calculation_method" class="form-control" id="edit_successful_reward_calculation_method"></label> 
              <input type="hidden" name="successful_reward_calculation_method" id="edit_successful_reward_calculation_method_h">
            </div>
          </div>
          <div class="form-group row chois_ratio" ><label for="ratio" class="col-sm-3 col-form-label">割合（％）&nbsp;<span class="text-danger required">*</span></label>
            <div class="col-sm-9">
              <label name="ratio" class="form-control" id="edit_ratio"></label>
            </div>
          </div>
          <div class="form-group row chois_ratio" ><label for="terms_at_rate" class="col-sm-3 col-form-label">理論年収の定義&nbsp;<span class="text-danger required">*</span></label>
            <div class="col-sm-9">
              <textarea name="terms_at_rate" class="form-control" id="edit_terms_at_rate" readonly rows="8"></textarea>
            </div>
          </div>
          <div class="form-group row not_chois_ratio" ><label for="fixed_reward_amount" class="col-sm-3 col-form-label">固定報酬額&nbsp;<span class="text-danger required">*</span></label>
            <div class="col-sm-9">
              <label name="fixed_reward_amount" class="form-control" id="edit_fixed_reward_amount"></label>
            </div>
          </div>
          <div class="form-group row"><label for="refund_provision" class="col-sm-3 col-form-label">返金規定&nbsp;<span class="text-danger required">*</span></label>
            <div class="col-sm-9"> 
              <textarea name="refund_provision" class="form-control" id="edit_refund_provision" readonly rows="8"></textarea>
            </div>
          </div>
          <div class="form-group row"><label for="memo" class="col-sm-3 col-form-label"></label>
            <div class="col-sm-9">
              <textarea name="memo" class="form-control" id="edit_memo" readonly rows="8"></textarea>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>
</div>

<div class="row create_page">
  <div class="masonry-item col-md-2 d-none d-lg-block d-xl-block d-md-block col-12">&nbsp;</div>
  <div class="col-md-8 col-12">
    <div class="card">
      <div class="card-header">
        <h3 class='card_title'>エージェント限定情報</h3>
      </div>
      <div class="card-body">
        <div class="masonry-item">
          <div class="form-group row"><label for="successful_reward_calculation_method" class="col-sm-3 col-form-label">成功報酬の算定方法&nbsp;<span class="text-danger required">*</span></label>
            <div class="col-sm-9">
              <select name="successful_reward_calculation_method" class="form-control" id="successful_reward_calculation_method">
                <option value=1>割合(％)</option>
                <option value=2>固定報酬</option>
              </select>
            </div>
          </div>
          <div class="form-group row chois_ratio" ><label for="ratio" class="col-sm-3 col-form-label">割合（％）&nbsp;<span class="text-danger required">*</span></label>
            <div class="col-sm-9">
                <input type="text" name="ratio" class="form-control" id="ratio" placeholder="年収の　〇〇％">
            </div>
          </div>
          <div class="form-group row chois_ratio" ><label for="terms_at_rate" class="col-sm-3 col-form-label">割合時の規約&nbsp;<span class="text-danger required">*</span></label>
            <div class="col-sm-9">
                <textarea class="form-control" name="terms_at_rate" id="terms_at_rate" rows="6"></textarea>
              </div>
            </div>
          <div class="form-group row not_chois_ratio" ><label for="fixed_reward_amount" class="col-sm-3 col-form-label">固定報酬額&nbsp;<span class="text-danger required">*</span></label>
            <div class="col-sm-9">
                <input type="text" name="fixed_reward_amount" class="form-control" id="fixed_reward_amount" placeholder="一律固定報酬　〇〇万円">
            </div>
          </div>
          <div class="form-group row"><label for="refund_provision" class="col-sm-3 col-form-label">返金規定&nbsp;<span class="text-danger required">*</span></label>
            <div class="col-sm-9"> 
                <textarea class="form-control" name="refund_provision" id="refund_provision" rows="6"></textarea>
            </div>
          </div>
          <div class="form-group row"><label for="memo" class="col-sm-3 col-form-label"></label>
            <div class="col-sm-9">
                <textarea class="form-control" name="memo" id="memo" rows="6"></textarea>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>
</div>
<script>
$(function(){
    //エージェント限定情報をラベル化した際の値
    document.getElementById('edit_ratio').innerHTML = @json($rec_info_re['Theoretical_annual']);
    $('#edit_successful_reward_calculation_method_h').val(@json($rec_info_re['calculation_method_performance_fee']));
    var flg_successful_reword = (@json($rec_info_re['calculation_method_performance_fee']) == 1 ) ? '割合(%)' : '固定報酬' ;
    document.getElementById('edit_successful_reward_calculation_method').innerHTML = flg_successful_reword;
    document.getElementById('edit_terms_at_rate').innerHTML = @json($rec_info_re['Theoretical_annual_income']);
    document.getElementById('edit_fixed_reward_amount').innerHTML = @json($rec_info_re['fixed_reward']);
    document.getElementById('edit_refund_provision').innerHTML = @json($rec_info_re['refund_policy']);
    document.getElementById('edit_memo').innerHTML = @json($rec_info_re['warning_text']);
})
</script>
