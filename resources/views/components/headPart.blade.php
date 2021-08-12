
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
  <meta name="keywords" content="人材紹介会社,求人募集,中途採用,SES,業務委託,フリーランスエージェント,プラットフォーム">
  <style>
    #loader {
      transition: all .3s ease-in-out;
      opacity: 1;
      visibility: visible;
      position: fixed;
      height: 100vh;
      width: 100%;
      background: #fff;
      z-index: 90000
    }

    #loader.fadeOut {
      opacity: 0;
      visibility: hidden
    }

    .spinner {
      width: 40px;
      height: 40px;
      position: absolute;
      top: calc(50% - 20px);
      left: calc(50% - 20px);
      background-color: #333;
      border-radius: 100%;
      -webkit-animation: sk-scaleout 1s infinite ease-in-out;
      animation: sk-scaleout 1s infinite ease-in-out
    }

    @-webkit-keyframes sk-scaleout {
      0% {
        -webkit-transform: scale(0)
      }

      100% {
        -webkit-transform: scale(1);
        opacity: 0
      }
    }

    @keyframes sk-scaleout {
      0% {
        -webkit-transform: scale(0);
        transform: scale(0)
      }

      100% {
        -webkit-transform: scale(1);
        transform: scale(1);
        opacity: 0
      }
    }

    .form-group{
      padding: .68rem .68rem;
      font-size: 1.0rem;
    }
  
    h3.card_title{
      font-size: 1.3rem;
      font-weight: bold;
      font-color: #F00;
}

  .check_radio_label{
    padding-left: 10px;
  }
  #div_footer {
    position: fixed;
    bottom: 0em;
    width: 100%;
    background: gray;
    opacity: 0.7;  
}
  .modal-dialog-fluid {
  max-width: inherit;
  width: 70%;
  height: 70%;

}


.target li .no-a {
  transition: background-color 2s;
  cursor: pointer;
}

.target li:hover .no-a {
  background-color:  #bbbbbb;
  transition: background-color 800ms;
}
ul {
  padding: 0;
}

ul li, ol li {
  color: #404040;
  /* border-left: solid 6px #1fa67a;/*左側の線*/ */
  border-bottom: solid 2px #dadada;/*下に灰色線*/
  background: whitesmoke;
  margin-bottom: 5px;/*下のバーとの余白*/
  line-height: 1.5;
  padding: 0.5em;
  list-style-type: none!important;/*ポチ消す*/
  font-weight: bold;
}

.experience_year {
  padding: 0px;
  margin: 0px;
  text-indent: 1em;
}

/* モーダルCSS */
.modalArea {
  display: none;
  position: fixed;
  z-index: 9000; /*サイトによってここの数値は調整 */
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}

.modalBg {
  width: 100%;
  height: 100%;
  background-color: rgba(30,30,30,0.9);
}

.modalWrapper {
  position: absolute;
  top: 50%;
  left: 50%;
  transform:translate(-50%,-50%);
  width: 70%;
  max-width: 500px;
  max-height: 300px;
  overflow-y: auto;
  padding: 10px 30px;
  background-color: #fff;
}

.closeModal {
  position: absolute;
  top: 0.5rem;
  right: 1rem;
  cursor: pointer;
}

</style>
  <link href="<?= url('/style.css') ?>" rel="stylesheet">
  <!-- <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery&#45;ui.css"> -->
