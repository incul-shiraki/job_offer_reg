<!-- job_offer_registrationのパーツ -->
<!-- 募集期間 -->
<div class="row">
  <div class="masonry-item col-md-2 d-none d-lg-block d-xl-block d-md-block col-12">&nbsp;</div>
  <div class="col-md-8 col-12">
    <div class="card">
      <div class="card-header">
        <h3 class='card_title'>募集期間</h3>
      </div>
      <div class="card-body">
        <div class="masonry-item">
          <div class="form-group row"><label for="recruiting_end_expected_date" class="col-sm-3 col-form-label">募集終了予定日&nbsp;<span class="text-danger required">*</span></label>
            <div class="col-sm-9 input_item" name="recruiting_end_expected_date" class="form-control" id="recruiting_end_expected_date">
              <label style="padding: .18rem .18rem;">
              <input type="checkbox" name="recruiting_end_expected_date" value=1 {{ old('recruiting_end_expected_date',1) == 1 ? 'checked' : '' }} >&nbsp;終了予定日を定めない</label>
            </div>
          </div>
          <div class="form-group row" id="calender_area_view"><label for="calender_area" class="col-sm-3 col-form-label"></label>
            <div class="col-sm-9"><input type="date" name="calender_area" class="form-control" id="calender_area"> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<br>
