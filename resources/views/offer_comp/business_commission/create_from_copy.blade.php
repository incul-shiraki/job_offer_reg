<!-- job_offer_registrationのパーツ -->
<!-- コピーから作成 -->
<div class="page-container" style="padding-left: 0;">
<div class="row">
  <div class="masonry-item col-md-2 d-none d-lg-block d-xl-block d-md-block col-12">&nbsp;</div>
  <div class="col-md-8 col-12">
    <div class="card create_page">
      <div class="card-body">
        <div class="masonry-item">
          <div class="form-group row">
            <div class="col-sm-9 input_item" name="other_recruit" class="form-control" id="other_recruit">
              <label style="padding: .18rem .18rem;"><input type="checkbox" name="other_recruit" value=1 {{ old('other_recruit') == 1 ? 'checked' : '' }} >&nbsp;他の求人や業務委託案件からコピーして作成する</label>
            </div>
          </div>
          <form action="remaking" method="get">
            <div class="form-group row" id="makecopy">
              <div class="col-sm-9">
                <select name="movecopy" class="form-control" id="movecopy">
                  @foreach ($rec_info as $keys => $values)
                    <option value="{{$values["id"]}}">{{$values["job_title"]}}</option>
                  @endforeach
                </select>
              </div>
              <div>
                <button type="submit">コピーを作成する</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<br>
