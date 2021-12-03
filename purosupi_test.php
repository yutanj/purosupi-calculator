<?php
error_reporting(0);
//GET送信が行われているか判定

    //数値かどうか判定
        //応募した賞のあたり数
        $no = (int)$_POST['no'];
        //みんなの応募数
        $no2 = (int)$_POST['no2'];
        //あなたの応募数
        $no3 = (int)$_POST['no3'];

        if($no == 10 || $no == 35 || $no == 3500 || $no == 11500 || $no == 90000 || $no == 400000 || $no == 800000){
            $all_events = nCr($no2, $no3, $no3);
            //echo $all_events;
            //echo '___';
            $all_lose = nCr($no2 - $no, $no3, $no3);
            //echo $all_lose;
            //echo '___';
            $return = (($all_events - $all_lose) / $all_events)*100;
            //echo $return;
            //echo '___';
            $result = round($return,5);
            echo '当選確率: '.$result.'%';
            //echo 'qqqqqq';
        } elseif ($no == 1000000 || $no == 1300000){
            $all_events = nCr($no2, $no3, $no3);
            //echo $all_events;
            $all_lose = nCr($no2 - $no, $no3, $no3);
            //echo $all_lose;
            $return = (($all_events - $all_lose) / $all_events)*100;
            echo round($return,2);
            //echo 'noooooo';
        }

        function nCr($n, $r, $r_stable){
          if ($r > $n) {
            echo 'みんなの応募数 > あなたの応募数 になるように数を入力してください';;
          } elseif($n > $r){
            $bunsi = 1;
            $bunbo = 1;
            for ($i = 0; $i < $r_stable; $i++) {
              $bunsi *= $n;
              $n--;
              $bunbo *= $r;
              $r--;
            }
            $return = ($bunsi / $bunbo);
            return $return;
          }
        }

 ?>
