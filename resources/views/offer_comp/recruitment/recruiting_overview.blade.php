<!-- job_offer_registrationのパーツ -->
<!-- 募集概要 -->
<div class="row">
  <div class="masonry-item col-md-2 d-none d-lg-block d-xl-block d-md-block col-12">&nbsp;</div>
  <div class="col-md-8 col-12">
    <div class="card">
      <div class="card-header">
        <h3 class='card_title'>募集概要</h3>
      </div>
      <div class="card-body">
        <div class="masonry-item">
            <div class="form-group row">
              <label for="job_category1" class="col-sm-3 col-form-label">職種カテゴリー1&nbsp;<span class="text-danger required">*</span></label>
              <div class="col-sm-9">
                <select name="job_category1" class="form-control" id="job_category1">
                </select>
              </div>
            </div>
            <div class="form-group row"><label for="job_category2"
                class="col-sm-3 col-form-label">職種カテゴリー2&nbsp;<span class="text-danger required">*</span></label>
              <div class="col-sm-9">
                <select name="job_category2" class="form-control" id="job_category2">
                </select>
              </div>
            </div>
            <div class="form-group row"><label for="recruiting_job_category_name" class="col-sm-3 col-form-label">募集職種名&nbsp;<span class="text-danger required">*</span></label>
              <div class="col-sm-9">
                <input type="text" name="recruiting_job_category_name" class="form-control" id="recruiting_job_category_name" placeholder=""></div>
            </div>
            <div class="form-group row"><label for="job_offer_title" class="col-sm-3 col-form-label">求人タイトル&nbsp;<span class="text-danger required">*</span></label>
                <div class="col-sm-9"><input type="text" name="job_offer_title" class="form-control" id="job_offer_title" placeholder=""></div>
            </div>
            <div class="form-group row"><label class="col-sm-3 col-form-label">特徴・訴求ポイント</label>
              <div class="col-sm-9 input_item" name="feature_offer_point" class="form-control" id="feature_offer_point">
                @foreach ($charmpoints as $charmpoint => $values)
                  <label style="padding: .18rem .18rem;"><input id="feature_{{$charmpoint}}" type="checkbox" name="feature_offer_point[]" value={{$charmpoint}} onclick="click_cb();">&nbsp;{{$values}}</label>
                @endforeach
              </div>
            </div>
            <div class="form-group row"><label for="main_image" class="col-sm-3 col-form-label">画像（メイン）&nbsp;<span class="text-danger required">*</span></label>
              <div class="col-sm-9"><input type="file" name="main_image" accept="image/png, image/jpg" id="main_image" value="{{ old('main_image') }}">
              </div>
            </div>
            <div class="form-group row"><label for="sub_image1" class="col-sm-3 col-form-label">画像（サブ1）</label>
              <div class="col-sm-9"><input type="file" name="sub_image1" accept="image/png, image/jpg" id="sub_image1" value="{{ old('sub_image1') }}">
              </div>
            </div>
            <div class="form-group row"><label for="sub_image2" class="col-sm-3 col-form-label">画像（サブ2）</label>
              <div class="col-sm-9"><input type="file" name="sub_image2" accept="image/png, image/jpg" id="sub_image2" value="{{ old('sub_image2') }}">
              </div>
            </div>
            <div class="form-group row"><label for="sub_image3" class="col-sm-3 col-form-label">画像（サブ3）</label>
              <div class="col-sm-9"><input type="file" name="sub_image3" accept="image/png, image/jpg" id="sub_image3" value="{{ old('sub_image3') }}">
              </div>
            </div>
            <div class="form-group row"><label for="sub_image4" class="col-sm-3 col-form-label">画像（サブ4）</label>
              <div class="col-sm-9"><input type="file" name="sub_image4" accept="image/png, image/jpg" id="sub_image4" value="{{ old('sub_image4') }}">
              </div>
            </div>
            <div class="form-group row"><label for="sub_image5" class="col-sm-3 col-form-label">画像（サブ5）</label>
              <div class="col-sm-9"><input type="file" name="sub_image5" accept="image/png, image/jpg" id="sub_image5" value="{{ old('sub_image5') }}">
              </div>
            </div>
            <div class="form-group row"><label for="customer_acquisition_use_availability" class="col-sm-3 col-form-label">集客利用の可否</label>
              <div class="col-sm-9">
                <select name="customer_acquisition_use_availability" class="form-control" id="customer_acquisition_use_availability">
                    <option value=1>選択しない</option>
                    <option value=2>集客利用不可</option>
                    <option value=3>完全非公開設定</option>
                </select>
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
    var rec = @json($rec_info_re);
    var http_word = 'http://localhost/';

  //業種１
  $('#job_category1').html("");
  var first_category_array = @json($first_category);
    $('#job_category1').append('<option hidden class=\"not_select\">選択してください</option>');
  for ( var i = 0; i < first_category_array.length; i++ ){
    $('#job_category1').append('<option  value=' + first_category_array[i]['id'] + '>' + first_category_array[i]['name']+ '</option>');
  }

  if(rec != 0){
    $('#job_category1').val(rec['occupation_category_1']);
  }

  //業種２
  var first_category_array = @json($first_category);
  $('#job_category1').change(function() {
    var num = $('#job_category1').val();
    $('#job_category2').html("");
    var second_category_array = @json($second_category);
    $('#job_category2').append('<option hidden class=\"not_select\">選択してください</option>');
    for ( var i = 0; i < second_category_array.length; i++ ){
      if (num == second_category_array[i]['first_job_category_id']) {
        $('#job_category2').append('<option  value=' + second_category_array[i]['id'] + ' data-val=' + second_category_array[i]['first_job_category_id'] + '>' + second_category_array[i]['name']+ '</option>');
      }
    }
  });

  if(rec != 0){
    var num = $('#job_category1').val();
    $('#job_category2').html("");
    var second_category_array = @json($second_category);
    for ( var i = 0; i < second_category_array.length; i++ ){
      if (num == second_category_array[i]['first_job_category_id']) {
        $('#job_category2').append('<option  value=' + second_category_array[i]['id'] + ' data-val=' + second_category_array[i]['first_job_category_id'] + '>' + second_category_array[i]['name']+ '</option>');
      }
    }
  //業種2
    $('#job_category2').val(rec['occupation_category_2']);


  //メインイメージの表示（値がない場合は非表示
  if(rec != 0){
    $('#main_image').after('<img src="" id="pict_main" name="pict_main">'); 
    document.getElementById('pict_main').src = http_word + rec['image_main'];
  }
  
  //サブイメージの表示（値がない場合は非表示
  if(rec != 0){
    //配列作成ファンクションの呼び出し
    var imageArray = create_image_array();
    //配列の要素数分ループ　要素の値がNULLの場合はスキップ
    for (var i = 1; i <= imageArray.length; i++){
      if(imageArray[i-1]){
        $('#sub_image' + i).after('<img src="" id="pict_sub' + i + '" name="pict_sub' + i + '">'); 
        document.getElementById('pict_sub' + i).src = http_word + imageArray[i-1];
      }
    }
  }
    
  //サブイメージを配列に格納
  function create_image_array(){
    if(rec != 0){
      var imageArray = [];
      for(var i = 1; i <= 5; i++){
        imageArray.push(rec['image_sub_' + i])
      }
    }
    return imageArray;
  }

  }
})
</script>
