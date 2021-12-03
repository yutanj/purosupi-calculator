<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <title>プロスピA - 大抽選会2021確率計算機</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <style type="text/css">
  footer {
  width: 100%;
  text-align: center;
  color: #000;
  }
  .footer_wrapper {
    margin-top: 30px;
  }
  .footer_title {
    font-size: 20px;
    padding-top: 20px;
    padding-bottom: 8px;
    margin-top: 30px;
  }
  .footer_copyright {
    font-size: 13px;
    padding-top: 50px;
    padding-bottom: 5px;
  }
  .footer-text {
  color: #fff;
  }
  .br-sp {
    display: none;
  }
  html {
  box-sizing: border-box;
  /*font-size: 62.5%;*/
}
  .cdt_wrapper{
    margin-bottom: 30px;
  }
@media screen and (min-width: 768px) {
  /*
  html {
    font-size: 78.195%;
  }
  */
}
/*
body {
  font-size: 1.2rem;
  line-height: 1.75em;
}
*/

.cdt_wrapper {
  background-color: #e9e9eb;
  font-weight: bold;
  text-align: center;
  line-height: 2;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-pack: center;
  justify-content: center;
  -ms-flex-align: center;
  align-items: center;
}

@media screen and (min-width: 768px) {
  .cdt_wrapper {
    line-height: 2.5;
    font-size: 1.8rem;
    padding: 0 20px;
  }
}

.cdt_wrapper small {
  font-size: .6em;
  padding: 0 .4em;
}

.cdt {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-align: center;
  align-items: center;
  -ms-flex-pack: center;
  justify-content: center;
}

.cdt_txt {
  font-size: .6em;
  display: inline-block;
  margin-right: .6em;
}

@media screen and (min-width: 768px) {
  .cdt_txt {
    font-size: .5em;
  }
}

.cdt_txt span {
  display: block;
  line-height: 1;
}

.cdt_date {
  font-size: 1.6rem;
}

.cdt_num {
  background-color: #ffffff;
  padding: 0 .15em;
}

@media screen and (min-width: 768px) {
  .cdt_num {
    line-height: 1;
    padding: .3em .15em;
  }
}
  </style>
  <meta name=”description” content="賞を選択・応募数を入力して確率を計算できます。今のところA賞~F賞までの対応です。">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-GNTCWSEP0G"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-GNTCWSEP0G');
  </script>
</head>
<body>
    <div class="container">
        <header>
           <div class="row">
                    <h1>プロスピA 大抽選会 確率計算機</h1>
            </div>
        </header>
    </div>
    <div class="cdt_wrapper">
  <div class="cdt">
    <span class="cdt_txt" id="cdt_txt"></span>
    <span class="cdt_date" id="cdt_date"></span>
  </div>
</div>
    <form>
          <div class="form-group">
            <label class="control-label">賞を選択</label>
            <select name="prize">
              <option>賞を選択してください</option>
              <option value="35">A賞 (35本)</option>
              <option value="3500">B賞 (3500本)</option>
              <option value="11500">C賞 (11500本)</option>
              <option value="90000">D賞 Sランク限界突破コーチ(90000本)</option>
              <option value="400000">E賞 Sランク契約書(400000本)</option>
              <option value="800000">F賞 10連ゴールド契約書(800000本)</option>
              <option value="1000000">G賞 Sランク特訓コーチ(1000000本)</option>
              <!--<option value="1300000">H賞 5000コイン(1300000本)</option>-->
            </select>
          </div>
          <div class="form-group">
            <label class="control-label">みんなの応募数</label>
            <input class="apply_all" type="number" placeholder="1000000">
          </div>
          <div class="form-group">
            <label class="control-label">あなたの応募数</label>
            <input class="apply_you" type="number" placeholder="5">
          </div>
          <input type="button" class="sample_btn" value="計算する">
        </form>
        <div class="result"></div>
        <ul id="list01">

        </ul>
        <footer>
          <div class="footer_wrapper">
            <p class="footer_copyright">© 2021 SUSURU TV. maps</p>
          </div>
        </footer>


        <script>
        $(function(){
            //.sampleをクリックしてajax通信を行う
            $('.sample_btn').click(function(){
              //console.log($('[name=prize]').val());
              //console.log($('.apply_all').val());
              //console.log($('.apply_you').val());
                $.ajax({
                    url: 'purosupi_test2.php',
                    /* 自サイトのドメインであれば、https://kinocolog.com/ajax/test.html というURL指定も可 */
                    type: 'POST',
                    dataType: 'text',
                    data: { no : $('[name=prize]').val(),
                            no2 : $('.apply_all').val(),
                            no3 : $('.apply_you').val()}
                }).done(function(data){
                    /* 通信成功時 */
                    //console.log(data);
                    var res = data.split('<br>');
                    var res_num = res.length;
                    //console.log(res_num);
                    //console.log($('[name=prize]').val());

                    //結果表示
                    var hit_num = $('[name=prize]').val();
                    console.log(hit_num);
                    if (hit_num == 35 || hit_num == 3500 || hit_num == 11500 || hit_num == 90000 || hit_num == 400000 || hit_num == 800000){
                      $("#list01").empty();
                      $('.result').text(data); //取得したHTMLを.resultに反映
                      //$("#list01").empty();
                    } else if(hit_num == 1000000 || hit_num == 1300000){
                      $('.result').empty();
                      $("#list01").empty();
                      for(var k=0; k < res_num-1; k++){
                        $("ul").append(`<li>${res[k]}</li>`);
                      }
                    }

                }).fail(function(data){
                    /* 通信失敗時 */
                    alert('通信失敗！');

                });
            });
        });

                // ▼ カウントダウンタイマーの設定
        function CountdownTimer(elm, tl, mes) {
          this.initialize.apply(this, arguments);
        }
        CountdownTimer.prototype = {
          initialize: function (elm, tl, mes) {
            this.elem = document.getElementById(elm);
            this.tl = tl;
            this.mes = mes;
          },
          countDown: function () {
            var timer = '';
            var today = new Date();
            var day = Math.floor((this.tl - today) / (24 * 60 * 60 * 1000));
            var hour = Math.floor((day * 24) + ((this.tl - today) % (24 * 60 * 60 * 1000)) / (60 * 60 * 1000));
            var min = Math.floor(((this.tl - today) % (24 * 60 * 60 * 1000)) / (60 * 1000)) % 60;
            var sec = Math.floor(((this.tl - today) % (24 * 60 * 60 * 1000)) / 1000) % 60 % 60;
            //var milli = Math.floor(((this.tl - today) % (24 * 60 * 60 * 1000)) / 10) % 100;
            var me = this;

            if ((this.tl - today) > 0) {
              if (hour) timer += '<span class="cdt_num">' + hour + '</span><small>時間</small>';
              timer += '<span class="cdt_num">' + this.addZero(min) + '</span><small>分</small><span class="cdt_num">' + this.addZero(sec) + '</span><small>秒</small>';
              this.elem.innerHTML = timer;
              tid = setTimeout(function () {
                me.countDown();
              }, 10);
            } else {
              this.elem.innerHTML = this.mes;
              return;
            }
          },
          addZero: function (num) {
            return ('0' + num).slice(-2);
          }
        }

        // ▼ 開始＆終了日時の指定と日付の判別
        function CDT() {
          var myD = Date.now(); // 1970/1/1午前0時から現在までのミリ秒
          var start = new Date('2018-11-05T00:00+09:00'); // 開始日時の指定
          var myS = start.getTime(); // 1970/1/1午前0時からの開始日時までのミリ秒
          var end = new Date('2021-10-28T14:59+09:00'); // 終了日時の指定
          var myE = end.getTime(); // 1970/1/1午前0時から終了日時までのミリ秒

          // 今日が開始日前か期間中か終了日後かの判別
          if (myS <= myD && myE >= myD) {
            var text = '<span>イベント</span><span>終了まで</span>';
            var tl = end;
          } // 期間中
          else if (myS > myD) {
            var text = '<span>開催</span><span>まで</span>';
            var tl = start;
          } // 開始日前
          else {
            var text = "";
          } // 終了日後

          var timer = new CountdownTimer('cdt_date', tl, '<small>終了しました</small>'); // 終了日後のテキスト
          timer.countDown();
          target = document.getElementById("cdt_txt");
          target.innerHTML = text;
        }
        window.onload = function () {
          CDT();
        }
        </script>

</body>
</html>
